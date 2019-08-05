<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Illuminate\Pagination\LengthAwarePaginator;
use App\Menu;
use App\Order;
use App\AuditTrail;
use App\Category;
use App\Company;
use App\SystemSetting;
use Response;
=======
use App\Menu;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Image;
use Carbon;
use DB;
use PDF;
<<<<<<< HEAD
use Auth;
use Excel;
=======
use App\AuditTrail;
use Auth;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD

    protected function paginate($menus, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the menus to display in current page
        $currentPagemenus = $menus->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPagemenus, count($menus), $perPage);
    }
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function batch(Request $request) {
        $success = true;
        $show_error = false;
        $records = 0;
        
        $v = Validator::make($request->all(), [
            'excel' => 'required|mimes:xls,xlsx,csv',
        ]);

        if ($v->fails()) {
            $success = false;
            return response()->json(['success'=>$success, 'error_msg' => $show_error, 'errors'=>$v->errors()->get('excel')]);
        } else {
            $path = $request->file('excel')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    $category = Category::where('name', $value->category)->first();
                    try {
                        Menu::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'description' => $value->description,
                            'cost' => $value->cost <= $value->price ? $value->cost : 0,
                            'price' => $value->cost <= $value->price ? $value->price : 0,
                            'category_id' => $category != null ? $category->id : 1,
                        ]);
                        $records++;
                    }
                    catch (\Exception $ex) {
                        continue;
                    }
                }
            }                

            $menus = $this->paginate(Menu::orderBy('created_at', 'DESC')->get())->setPath('menus');
            return Response::json(['success'=>$success,'menus'=>$menus, 'records'=>$records]);
        }
    }

    public function downloadExcel($type) {
        $menus = Menu::get()->toArray();
        return Excel::create('menu_list', function($excel) use ($menus) {
            $excel->sheet('sheet name', function($sheet) use ($menus)
            {
                $sheet->fromArray($menus);
            });
        })->download($type);
    } 


=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    public function pdfview(Request $request)
    {
        $menus = DB::table("menus")->get();
        view()->share('menus',$menus);
<<<<<<< HEAD
        view()->share('company', Company::all()->first());
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

        if($request->has('download')){

            $pdf = PDF::loadView('menus.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Downloaded ' . 'Menu List', 
            ]);
            return $pdf->download('Menus-'.Carbon\Carbon::now().'.pdf');
        }
        return view('menus.pdf');

    }

    public function index(Request $request)
    {
<<<<<<< HEAD
        if(SystemSetting::first()->system_mode != 'Retailer') {  
            $menus = $this->paginate(Menu::orderBy('created_at', 'DESC')->get())->setPath('menus');
            if ($request->ajax()) {
                return view('menus.data', compact('menus'));
            }
            return view('menus.index', compact('menus'));
        } else {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $menus;
        if($request->input('tag') == 'category') {
            $menus = $this->paginate(Menu::where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->input('search') .'%')->value('id')))->setPath('menus');
        }
        else if($request->has('search') && Schema::hasColumn('menus', $request->input('tags'))) {
            $menus = $this->paginate(Menu::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%'))->setPath('menus');
        }
        else{
            $menus = $this->paginate(Menu::orderBy('created_at', 'DESC')->get())->setPath('menus');
        }

        if ($request->ajax()) {
            return Response::json(['success'=>true,'menus'=>$menus]); 
        }
        return Response::json(['success'=>true,'menus'=>$menus]); 
    }

    public function view(Request $request)
    {
        $menu = Menu::findOrFail($request->id);
        $category = $menu->category->name;
        $profit = $menu->price - $menu->cost;
        return Response::json(['success'=>true,'menu'=>$menu,'category'=>$category,'profit'=>$profit]);  
=======
        $menus;
        if($request->input('tag') == 'category') {
            $menus = Menu::where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->input('search') .'%')->value('id'))->paginate(5);
        }
        else if($request->has('search') && Schema::hasColumn('menus', $request->input('tags'))) {
            $menus = Menu::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $menus = Menu::paginate(5);
        }
        if ($request->ajax()) {
            return view('menus.data', compact('menus'));
        }

        return view('menus.index', compact('menus'));
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
        $fname = '';
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:menus',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
<<<<<<< HEAD
            'image' => 'mimes:jpeg,bmp,png',
            'cost' => 'required||numeric|max:' . $request->price,
            'price' => 'required|numeric|min:'. $request->cost,
        ], 
        [
            'price.min' => 'The price should be greater than the cost.',
            'cost.max' => 'The cost should be lesser than the price.'
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            }
            
            $menus = Menu::create([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $fname,
                'cost' => $request->cost,
                'price' => $request->price,
            ]);

            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'form_name' => 'Menu',
                'activity' => 'Created ' . 'Menu Item ' . $request->name .' ('.$request->ref_code.')', 
            ]);
            
            return Response::json(['success'=>true,'menus'=>$menus]);
        }
=======
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->input('ref_code') . '.' . $file->getClientOriginalExtension();
            $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
            Image::make($file->getRealPath())->resize(150, 150)->save();
            $fname = $filename;
        }
        
        Menu::create([
            'ref_code' => $request->ref_code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => !$request->has('image')? $fname : '',
            'cost' => $request->cost,
            'price' => $request->price,
        ]);

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Created ' . 'Menu Item ' . $request->name, 
        ]);
        
        return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
        $fname = '';
        $v = Validator::make($request->all(), [
<<<<<<< HEAD
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'cost' => 'required||numeric|max:' . $request->price,
            'price' => 'required|numeric|min:'. $request->cost,
        ], 
        [
            'price.min' => 'The price should be greater than the cost.',
            'cost.max' => 'The cost should be lesser than the price.'
=======
            'ref_code' => 'required|string|max:255|',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }  else {
            $menus=Menu::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
<<<<<<< HEAD
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
=======
                $filename = $request->input('ref_code') . '.' . $file->getClientOriginalExtension();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            } else {
                $fname = $menus->getImageFile();
            }

<<<<<<< HEAD
            $old_code = $menus->ref_code;

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            $menus->update([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $fname,
                'cost' => $request->cost,
                'price' => $request->price,
                'active' => $request->active,
            ]);  

<<<<<<< HEAD
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'form_name' => 'Menu',
                'activity' => 'Updated ' . 'Menu Item ' . $request->name .' ('.$request->ref_code.')', 
            ]);

            Order::where('ref_code', $old_code)->update(['ref_code'=> $menus->ref_code]);
            
            return Response::json(['success'=>true,'menus'=>$menus]); 
=======
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Menu',
                            'activity' => 'Updated ' . 'Menu Item ' . $request->name, 
            ]);

            return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        }
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
