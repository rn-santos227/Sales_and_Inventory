<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Retailer;
use App\Receipt;
use App\Purchase;
use App\Order;
<<<<<<< HEAD
use App\Inventory;
use App\SystemSetting;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Anam\Phpcart\Cart;
use Illuminate\Http\Request;
use DB;
use Response;
use Auth;

class RetailerController extends Controller
{
<<<<<<< HEAD
    public function __construct()
    {
        $this->middleware('auth');
    }
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        if(SystemSetting::first()->system_mode == 'Retailer') {            
            $cart = new Cart('retailer');
            $carts = $cart->Items();

            return view('retailer.index',  compact('carts'));
        } else {
            return redirect()->back(); 
        }
=======
        
        $cart = new Cart('retailer');
        $carts = $cart->Items();
        return view('retailer.index',  compact('carts'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function search(Request $request) 
    {
<<<<<<< HEAD

        // $items = Inventory::whereActive('1')
        // ->where('quantity', '>', 0)
        // ->where(function($query) use($request) {
        //     $query->where('name', 'LIKE', '%'.$request->search.'%')
        //     ->orwhere('ref_code', 'LIKE', '%'.$request->search.'%');
        // })->groupBy('ref_code')
        // ->orderBy('created_at', 'asc')
        // ->get();

        $cost_layering_method = SystemSetting::all()->first()->cost_layering_method;
        $item_id = '';

        if($cost_layering_method == 'First In First Out')
        {
            $item_id = DB::raw('MIN(id) as ID');
        }
        else
        {
            $item_id = DB::raw('MAX(id) as ID');
        }


        $ids = Inventory::whereActive('1')
=======
        $items = Item::whereActive('1')
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        ->where('quantity', '>', 0)
        ->where(function($query) use($request) {
            $query->where('name', 'LIKE', '%'.$request->search.'%')
            ->orwhere('ref_code', 'LIKE', '%'.$request->search.'%');
<<<<<<< HEAD
        })
        ->select('ref_code', $item_id)
        ->groupBy('ref_code')
        ->pluck('ID');

        $items = Inventory::whereIn('id',$ids)->get();
=======
        })->get();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

        return Response::json(['success'=>true,'items'=>$items]);    
    }

    public function updateCart(Request $request)
    {
        $cart = new Cart('retailer');
        $cart->updateQty($request->id,$request->quantity);
        return Response::json(['success'=>true,'response'=>$cart]);   
    }

    public function addToCart(Request $request)
    {
<<<<<<< HEAD
        $inventory = Inventory::where('id', $request->id)->first();

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $cart = new Cart('retailer');
        $cart->add([
            'id'       => $request->id,
            'name'     => $request->name,
            'quantity' => 1,
<<<<<<< HEAD
            'price'    => $request->price + ($request->price * ($inventory->tax / 100)),
            'max' => $inventory->quantity,
        ]);

        $carts = $cart->Items();
        return Response::json(['success'=>true,'carts'=>$carts]);       
=======
            'price'    => $request->price
        ]);

        return Response::json(['success'=>true,'data'=>$cart]);       
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function deleteFromCart(Request $request)
    {
        $cart = new Cart('retailer');
        $cart->remove($request->id);
        return Response::json(['success'=>true,'data'=>$cart]);
 
    }

    public function clearCart()
    {
        $cart = new Cart('retailer');
        $cart->clear();
        return Response::json(['success'=>true,'data'=>$cart]);
    }

    public function total()
    {
        $cart = new Cart('retailer');
        $count = $cart->totalQuantity();
        $total = $cart->getTotal();
        $setting = DB::table('system_settings')->first();;
        return Response::json(['success'=>true,'total'=>$total, 'count'=>$count, 'setting'=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'status' => 'paid',
            'mode' => 'retailer',
        ]);

        $carts = json_decode($request->orders, true);
        foreach($carts as $cart) {
<<<<<<< HEAD
            // DB::table('items')
            // ->where('id', $cart['id'])
            // ->update(['quantity' => DB::table('items')->where('id', $cart['id'])->value('quantity') - $cart['quantity']]);

            $inventory = Inventory::where('id', $cart['id'])->first();
            $inventory->quantity -= $cart['quantity'];
            $inventory->save();

            Purchase::create([
                'ref_code' => $inventory->ref_code,
                'name' => $cart['name'],
                'cost' => $inventory->cost,
                'qty' => $cart['quantity'],
                'price' => $inventory->price,
                'subtotal' => $cart['subtotal'],
                'receipt_id' => $receipt->id,
                'tax_value' => $inventory->price * ($inventory->tax / 100),
                'status' => 'paid',
            ]);
=======
            DB::table('items')
            ->where('id', $cart['id'])
            ->update(['quantity' => DB::table('items')->where('id', $cart['id'])->value('quantity') - $cart['quantity']]);

            Purchase::create([
                'ref_code' => DB::table('items')->where('id', $cart['id'])->value('ref_code'),
                'name' => $cart['name'],
                'cost' => DB::table('items')->where('id', $cart['id'])->value('cost'),
                'qty' => $cart['quantity'],
                'price' => DB::table('items')->where('id', $cart['id'])->value('price'),
                'subtotal' => $cart['subtotal'],
                'receipt_id' => $receipt->id,
                'status' => 'paid',
            ]);

            // Order::create([
            //     'menu_id' => $cart['id'],
            //     'menu' => $cart['name'],
            //     'cost' => DB::table('items')->where('id', $cart['id'])->value('cost'),
            //     'qty' => $cart['quantity'],
            //     'price' => DB::table('items')->where('id', $cart['id'])->value('cost') * $cart['quantity'],
            //     'subtotal' => $cart['subtotal'],
            //     'receipt_id' => $receipt->id,
            //     'status' => 'served'
            // ]);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        }

        return Response::json(['success'=>true, 'carts'=>$carts]);
    }

<<<<<<< HEAD
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function show(Retailer $retailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Retailer $retailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retailer $retailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retailer  $retailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retailer $retailer)
    {
        //
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }
}
