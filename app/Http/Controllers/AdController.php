<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;
use DB;
use Image;
use Response;
use App\AuditTrail;
use Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        // return $ads;
        return view('ads.index',compact('ads'));
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
    public function deleteAd(Request $request)
    {
       Ad::where('id', $request->id)->delete();

        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Deleted ' . 'Ad Image '.$request->id, 
                        ]);
       return Response::json(['success'=>true]);
    }

    // upload add
    public function addAd(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file = $file->move(public_path().'/images/'.'/ads/', $filename);
            Image::make($file->getRealPath())->resize(683, 683)->save();
            $fname = $filename;
        }

        DB::table('ads')->insert(
            [
                'image' => $fname
            ]
        );

        AuditTrail::create([
                            'user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Account Settings',
                            'activity' => 'Uploaded ' . 'Ad Image', 
                        ]);
        return Response::json(['success'=>true]);
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
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }
}
