<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\AuditTrail;
use App\Restaurant;
use App\Order;
use App\Receipt;
use App\Table;
use App\Menu;
use App\Promo;
use App\SystemSetting;
use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
=======
use App\Menu;
use App\Restaurant;
use App\Order;
use App\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Anam\Phpcart\Cart;
use Response;
use Auth;

class FastFoodController extends Controller
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
<<<<<<< HEAD
        if(SystemSetting::first()->system_mode == 'FastFood') {
            $cart = new Cart();
            $carts = $cart->Items();
            return view('fastfood.index',compact('carts'));
        } else {
            return redirect()->back();
        }
    }
    public function getTray(Request $request)
    {
        $cart = new Cart();
        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);   
    }
=======
        $menus = Menu::whereActive('1')->get();
        $cart = new Cart();
        $carts = $cart->Items();
        return view('fastfood.index', compact('menus','carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function updateTray(Request $request)
    {
        $cart = new Cart();
        $cart->updateQty($request->id,$request->quantity);
<<<<<<< HEAD
        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);   
=======
        return Response::json(['success'=>true,'data'=>$cart]);   
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
    
    public function addToTray(Request $request)
    {
        $cart = new Cart();
        $cart->add([
            'id'       => $request->id,
            'name'     => $request->name,
            'quantity' => 1,
            'price'    => $request->price
        ]);
<<<<<<< HEAD
        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);       
=======

        return Response::json(['success'=>true,'data'=>$cart]);       
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function deleteFromTray(Request $request)
    {
        $cart = new Cart();
        $cart->remove($request->id);
<<<<<<< HEAD
        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);
 
    }

    public function clearTray(Request $request)
=======
        return Response::json(['success'=>true,'data'=>$cart]);
 
    }

    public function clearTray()
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    {
        $cart = new Cart();
        $cart->clear();
        return Response::json(['success'=>true,'data'=>$cart]);
    }

<<<<<<< HEAD
    public function total(Request $request)
=======
    public function total()
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    {
        $cart = new Cart();
        $count = $cart->totalQuantity();
        $total = $cart->getTotal();
<<<<<<< HEAD
        return Response::json(['success'=>true,'total'=>$total,'count'=>$count,
            'setting' => view('fastfood.index')->getData()['setting'],
            ]);
    }


    public function store(Request $request)
    {
        $promo = Promo::where('ref_code', $request->promo_ref_code)->first();
=======
        $setting = DB::table('system_settings')->first();;
        return Response::json(['success'=>true,'total'=>$total, 'count'=>$count, 'setting'=>$setting]);
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $receipt = Receipt::create([
            'total' => $request->subtotal,
            'vatable' => $request->vatable,
            'vat' => $request->vat,
            'vatexempt' => $request->vatexempt,
            'vat_sales' => $request->vatsales,
            'count' => $request->count,
            'amount_due' => $request->amountdue,
            'cash' => $request->cash,
            'change_due' => $request->changedue,
            'user_id' => Auth::user()->id,
            'status' => 'paid_and_pending',
<<<<<<< HEAD
            'mode' => 'fastfood',
            'service_type' => $request->service_type,
            'promo_id' => $promo === null ? 0 : $promo->id,
        ]);

        $orders = json_decode($request->orders, true);
        foreach($orders as $key => $value) {
            $menu = Menu::where('id', $value['id'])->first();
            Order::create([
                'ref_code' => $menu->ref_code,
                'name' => $value['name'],
                'qty' => $value['quantity'],
                'cost' => $menu->cost,
                'price' => $value['price'],
                'subtotal' => $value['subtotal'],
                'receipt_id' => $receipt->id,
            ]);
        }

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'FastFood POS',
                            'activity' => 'Issued ' . 'Receipt ' . $receipt->id, 
            ]);

        return Response::json(['success'=>true, 'receipt'=>$receipt]);
    }

    public function show(Restaurant $restaurant)
    {
        $items = Ad::all();
        return view('fastfood.monitor', compact('items'));
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
=======
            'mode' => 'fast_food',
        ]);

        $carts = json_decode($request->orders, true);
        foreach($carts as $cart) {
            Order::create([
                'ref_code' => DB::table('menus')->where('id', $cart['id'])->value('ref_code'),
                'name' => $cart['name'],
                'cost' => DB::table('menus')->where('id', $cart['id'])->value('cost'),
                'qty' => $cart['quantity'],
                'price' => $cart['price'],
                'subtotal' => $cart['subtotal'],
                'receipt_id' => $receipt->id,
                'status' => 'pending',
            ]);
        }

        return Response::json(['success'=>true, 'carts'=>$carts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
}
