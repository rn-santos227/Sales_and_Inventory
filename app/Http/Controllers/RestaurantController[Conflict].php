<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\Order;
use App\Receipt;
use App\Employee;
use App\Table;
use App\Menu;
use App\User;
use App\Promo;
use App\SystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Anam\Phpcart\Cart;
use Response;
use Auth;
use Hash;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(SystemSetting::first()->system_mode == 'Restaurant') {
            $cart = new Cart();
            $carts = $cart->Items();
            $receipt_id = Receipt::first() === null ? 10000000 : Receipt::orderBy('created_at', 'desc')->first()->id + 1;
            return view('restaurant.index',compact('carts', 'receipt_id'));
        } else {
            return redirect()->back();            
        }
    }



    public function confirmPassword(Request $request)
    {
        $users = DB::table('users')
                    ->where('user_level','Administrator')
                    ->get();

        foreach ($users as $item) {
            if (Hash::check($request->password,$item->password)) return Response::json(['success'=>true]); 
        }
        return Response::json(['success'=>false]); 
    }

    public function setTable(Request $request) 
    {
        $v = Validator::make($request->all(), [
            'table_id' => 'required|numeric|min:1',
            'employee_id' => 'required|numeric|min:1',
            'customer' => 'required|string|max:255',
        ],[
            'table_id.min' => 'No Available Table.',
            'employee_id.min' => 'No Attendant Available.',
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } else {
            $receipt = Receipt::create([
                'total' => 0,
                'vatable' => 0,
                'vat' => 0,
                'vat_exempt' => 0,
                'vat_sales' => 0,
                'count' => 0,
                'amount_due' => 0,
                'cash' => 0,
                'change_due' => 0,
                'user_id' => Auth::user()->id,
                'status' => 'pending',
                'mode' => 'restaurant',
                'promo_id' => 0,
            ]);

            $receipt_id = $receipt->id + 1;
            $employee = Employee::where('id', $request->employee_id)->first();

            $table = Table::findOrFail($request->table_id);
            $table->update([
                'customer' => $request->customer,
                'receipt_id' => $receipt->id,
                'status' => 'reserved',
                'waiter' => $employee->last_name . ', ' . $employee->first_name,
            ]); 

            $vacant = Table::where('status','vacant')->get();

            $occupied = Table::where('status','reserved')
            ->orwhere('status','occupied')->get();

            $employees = Employee::where([
                ['active', 1],
                ['designation','waiter'],
                ['present', 1],
            ])->get();

            return Response::json(['success'=>true,'table'=>$table, 'vacant' =>$vacant, 'occupied'=>$occupied, 'receipt_id' => $receipt_id, 'employees' => $employees]);
        }

    }

    public function cancelTable(Request $request) {     
        $table = Table::findOrFail($request->table_id);
        $receipt = Receipt::findOrFail($request->receipt_id);

        $table->update([
            'customer' => '',
            'status' => 'vacant',
            'receipt_id' => '',
            'waiter' => '',
        ]);

        $receipt->update([
            'status' => 'voided',
        ]);

        Order::where('receipt_id', $receipt->id)
        ->update([
            'status' => 'voided',
        ]);

        $vacant = Table::where('status','vacant')->get();
        $occupied = Table::where('status','reserved')
        ->orwhere('status','occupied')->get();

        $employees = Employee::where([
            ['active', 1],
            ['designation','waiter'],
            ['present', 1],
        ])->get();

        return Response::json(['success'=>true,'table'=>$table, 'vacant' =>$vacant, 'occupied'=>$occupied, 'employees'=>$employees]); 
    }

    public function setTray(Request $request) 
    {
        $cart = new Cart($request->receipt_id);
        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]); 
    }


    public function updateTray(Request $request)
    {
        $cart = new Cart($request->receipt_id);
        $cart->updateQty($request->id,$request->quantity);
        $carts = $cart->Items();

        $menu = Menu::where('id', $request->id)->first();
        $order = Order::where([
            ['ref_code', $menu->ref_code],
            ['receipt_id', $request->receipt_id],
            ['status', 'pending'],
        ])->first();

        $menu = Menu::where('id', $request->id)->first();
        $order = Order::where([
            ['ref_code', $menu->ref_code],
            ['receipt_id', $request->receipt_id],
            ['status', 'pending'],
        ])->first();

        if($order === null) {
            Order::create([
                'ref_code' => $menu->ref_code,
                'name' => $request->name,
                'qty' => 1,
                'cost' => $menu->cost,
                'price' => $request->price,
                'subtotal' => $request->price,
                'receipt_id' => $request->receipt_id,
                'status' => 'pending',
            ]);
        } else {
            $order->update([
                'qty' => $order->qty <= 0 ? 1 : $order->qty + $request->value,
                'subtotal' => $cart->getTotal(),
            ]);
        }

        return Response::json(['success'=>true,'carts'=>$carts]);   
    }
    
    public function addToTray(Request $request)
    {
        $cart = new Cart($request->receipt_id);
        $cart->add([
            'id'       => $request->id,
            'name'     => $request->name,
            'quantity' => 1,
            'price'    => $request->price,
        ]);

        $menu = Menu::where('id', $request->id)->first();
        $order = Order::where([
            ['ref_code', $menu->ref_code],
            ['receipt_id', $request->receipt_id],
            ['status', 'pending'],
        ])->first();

        if($order === null) {
            Order::create([
                'ref_code' => $menu->ref_code,
                'name' => $request->name,
                'qty' => 1,
                'cost' => $menu->cost,
                'price' => $request->price,
                'subtotal' => $request->price,
                'receipt_id' => $request->receipt_id,
                'status' => 'pending',
            ]);
        } else {
            $order->update([
                'qty' => $order->qty + 1,
                'subtotal' => $cart->getTotal(),
            ]);
        }

        $table = Table::where('receipt_id', $request->receipt_id)->first();
        $table->update(['status'=>'occupied']);

        $employees = Employee::where([
            ['active', 1],
            ['designation','waiter'],
            ['present', 1],
        ])->get();

        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts, 'table'=>$table, 'employees' => $employees]);       
    }

    public function deleteFromTray(Request $request)
    {
        $cart = new Cart($request->receipt_id);
        $cart->remove($request->id);

        $menu = Menu::where('id', $request->id)->first();
        Order::where([
            ['ref_code', $menu->ref_code],
            ['receipt_id', $request->receipt_id],
            ['status', 'pending'],
        ])->delete();

        if($cart->totalQuantity() <= 0) Table::where('receipt_id', $request->receipt_id)->update(['status'=>'reserved']);

        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);
    }

    public function total(Request $request)
    {
        $total = 0;
        $count = 0;

        $orders = Order::where('receipt_id', $request->receipt_id)->get();
        foreach ($orders as $key => $order) {
            $total += $order->subtotal;
            $count += $order->qty;
        }

        return Response::json(['success'=>true,'total'=>$total,'count'=>$count,
        'setting' => view('restaurant.index')->getData()['setting'],
        ]);
    }

    public function pdfview(Request $request)
    {
        $employees = DB::table("employees")->get();
        
        if($request->has('download')){
            $pdf = PDF::loadView('employees.print');
            //return $pdf->download('Employees-'.Carbon\Carbon::now().'.pdf');
        }
        return view('employees.print');
    }

    public function store(Request $request)
    {
        $orders = Order::where('receipt_id', $request->receipt_id)->get();
        $promo = Promo::where('ref_code', $request->promo_ref_code)->first();

        foreach($orders as $key => $value) {
            if($value['status'] == 'pending') 
                return Response::json(['success'=> false, 'message' => 'There are still some pending orders.']);
        }

        $receipt = Receipt::where('id', $request->receipt_id)
        ->update([
            'total' => $request->subtotal,
            'vatable' => $request->vatable,
            'vat' => $request->vat,
            'vat_exempt' => $request->vatexempt,
            'vat_sales' => $request->vatsales,
            'count' => $request->count,
            'amount_due' => $request->amountdue,
            'cash' => $request->cash,
            'change_due' => $request->changedue,
            'user_id' => Auth::user()->id,
            'status' => 'paid',
            'mode' => 'restaurant',
            'service_type' => $request->service_type,
            'promo_id' => $promo === null ? 0 : $promo->id,
        ]);

        view()->share('receipt',$receipt);

        $cart = new Cart($request->receipt_id);

        $cart->clear();

        $table = Table::where('receipt_id' , $request->receipt_id)->first();
        $table->update([
            'receipt_id' => '',
            'customer' => '',
            'status' => 'vacant',
        ]); 

        $vacant = Table::where('status','vacant')->get();
        $occupied = Table::where('status','reserved');

        $employees = Employee::where([
            ['active', 1],
            ['designation','waiter'],
            ['present', 1],
        ])->get();    
        
        return Response::json(['success'=>true, 'receipt'=>$receipt, 'vacant' =>$vacant, 'occupied'=>$occupied, 'table'=> $table]);
    }

    public function serve(Request $request) 
    {
        $cart = new Cart($request->receipt_id);  
        $pending = Order::where([
            ['receipt_id', $request->receipt_id],
            ['status', 'pending']
        ])->get();

        $served = Order::where([
            ['receipt_id', $request->receipt_id],
            ['status', 'served']
        ])->get();

        foreach($served as $keys => $order) {
            $menu = Menu::where('ref_code',$order->ref_code)->first();
            $cart->remove($menu->id); 
            $order->id = $menu->id; 
        }

        foreach ($pending as $key => $order) {
            $menu = Menu::where('ref_code',$order->ref_code)->first();
            $order->id = $menu->id; 
        }

        return Response::json(['success'=>true, 'pending'=>$pending, 'served' =>$served]);
    }

    public function promo(Request $request)
    {
        $promo = Promo::where('ref_code', $request->ref_code)->first();
        if($promo === null) {
            return Response::json(['success'=>false, 'message' => 'The Promo does not exists.']);  
        }

        if($promo->expiration_date < date('Y-m-d')) {
            return Response::json(['success'=>false, 'message' => 'The Promo has already expired.']);    
        }

        return Response::json(['success'=>true, 'promo' => $promo]);
    }

}
