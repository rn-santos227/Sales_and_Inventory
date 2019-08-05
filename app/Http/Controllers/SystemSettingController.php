<?php

namespace App\Http\Controllers;
use App\SystemSetting;
use Illuminate\Http\Request;
use DB;

class SystemSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $systemsetting = SystemSetting::all()->first();
        return view('systemsettings.index', compact('systemsetting'));
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
     * @param  \App\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {  
<<<<<<< HEAD
        DB::table('themes')
            ->where('id', 1)
            ->update([
                'primary' => $request->primaryColorHidden,
                'secondary' => $request->secondaryColorHidden,
                'tertiary' => $request->tertiaryColorHidden
            ]);

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        $systemsettings = SystemSetting::findOrFail($id);
        
        if( ! isset($request->non_vat))
            $systemsettings->update(array_merge($request->all(), ['non_vat' => false]));
        else
            $systemsettings->update($request->all());

        return redirect('/systemsettings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemSetting $systemSetting)
    {
        //
    }
}
