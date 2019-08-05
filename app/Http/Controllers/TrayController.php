<?php

namespace App\Http\Controllers;

use App\Tray;
use Illuminate\Http\Request;
use Anam\Phpcart\Cart;




class TrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        //
    }

    public function addToTray(Request $request)
    {
      
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
     * @param  \App\Tray  $tray
     * @return \Illuminate\Http\Response
     */
    public function show(Tray $tray)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tray  $tray
     * @return \Illuminate\Http\Response
     */
    public function edit(Tray $tray)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tray  $tray
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tray $tray)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tray  $tray
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tray $tray)
    {
        //
    }
}
