<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\AuditTrail;
use Auth;
<<<<<<< HEAD
use Image;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        if(Auth::user()->user_level == 'Administrator') {
            $companies = Company::all()->first();

            return view('company.index',compact('companies'));
        } else {
            return redirect()->back();    
        }
=======
        $companies = Company::all()->first();
        return view('company.index',compact('companies'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'logo.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/logos/', $filename);
                Image::make($file->getRealPath())->resize(340, 100)->save();
                $fname = $filename;
            } else {
                $fname = '';
            }
        //updates data


        $companies = Company::findOrFail($id);
        $companies = Company::find(1);
        $companies->name = $request->name;
        $companies->logo = $fname;
        $companies->description = $request->description;
        $companies->email = $request->email;
        $companies->contact = $request->contact;
        $companies->address = $request->address;
        $companies->TIN = $request->TIN;
        $companies->save();
        
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Company Settings',
=======
        //updates data
        $companies = Company::findOrFail($id);
        $companies->update($request->all());  
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Suppliers',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                            'activity' => 'Updated ' . 'Company Settings', 
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
