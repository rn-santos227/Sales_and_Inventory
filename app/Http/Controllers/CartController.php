<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anam\Phpcart\Cart;
use App\Item;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addToCart(Request $request)
    {
        $items = DB::table('items')
             ->select('id', 'ref_code', 'name', 'price')
             ->where('ref_code','=', $request->ref_code)
             ->first();

         $cart = new Cart();
         $cart->add([
             'ref_code' => $request->ref_code,
             'id'       => $items->id,
             'name'     => $items->name,
             'quantity' => 1,
             'price'    => $items->price
         ]);

        return $cart->Items();

        // return view('retailer.index', compact('cart'));
    }

    public function clearCart()
    {
        $cart = new Cart();
        $cart->clear();

        return redirect()->back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
