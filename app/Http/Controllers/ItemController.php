<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Item;
use App\Inventory;
use App\Purchase;
use App\Category;
use App\Supplier;
use App\Company;
use App\SystemSetting;
=======
use App\Http\Controllers\Controller;
use App\Item;
use App\Inventory;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use Response;
use Image;
use App\AuditTrail;
use Auth;
use PDF;
use Carbon;
<<<<<<< HEAD
use Excel;
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
                    $supplier = Supplier::where('name', $value->supplier)->first();
                    try {
                        Item::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'description' => $value->description,
                            'category_id' => $category != null ? $category->id : 1,
                            'supplier_id' => $supplier != null ? $supplier->id : 1,
                        ]);
                        $records++;


                    }
                    catch(\Exception $ex) {
                        continue;
                    }
                }
            }                

            $items = $this->paginate(Item::orderBy('created_at', 'DESC')->get())->setPath('items');
            return Response::json(['success'=>$success,'items'=>$items, 'records'=>$records]);
        }
    }
    protected function paginate($items, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the items to display in current page
        $currentPageItems = $items->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPageItems, count($items), $perPage);
    }

    public function downloadExcel($type) {
        $items = Item::get()->toArray();
        return Excel::create('item_list', function($excel) use ($items) {
            $excel->sheet('sheet name', function($sheet) use ($items)
            {
                $sheet->fromArray($items);
            });
        })->download($type);
    } 

    
    public function pdfview(Request $request)
    {
        $items = DB::table("items")->get();
        view()->share('items',$items);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('items.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Downloaded ' . 'Item List', 
            ]);
            return $pdf->download('Items-'.Carbon\Carbon::now().'.pdf');
        }
        return view('items.pdf');

    }
    
    public function index(Request $request)
    {
        if(SystemSetting::first()->system_mode == 'Retailer') { 
            $items = $this->paginate(Item::orderBy('created_at', 'DESC')->get())->setPath('items');
            if ($request->ajax()) {
                return view('items.data', compact('items'));
            }
            return view('items.index', compact('items'));
        } else {
            return redirect()->back();   
        }
=======
    
    public function pdfview(Request $request)
    {
        $items = DB::table("items")->get();
        view()->share('items',$items);

        if($request->has('download')){

            $pdf = PDF::loadView('items.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Downloaded ' . 'Item List', 
            ]);
            return $pdf->download('Items-'.Carbon\Carbon::now().'.pdf');
        }
        return view('items.pdf');

    }
    public function index(Request $request)
    {
        $items = Item::orderBy('created_at', 'DESC')->paginate(5);
        if ($request->ajax()) {
            return view('items.data', compact('items'));
        }
        return view('items.index', compact('items'));
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function search(Request $request)
    {
        $items;
        if($request->tags == 'category') {
<<<<<<< HEAD
            $items = $this->paginate(Item::orderBy('created_at', 'DESC')->where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->search .'%')->value('id')))->setPath('items');
        }
        else if($request->has('search') && Schema::hasColumn('items', $request->tags)) {
            $items = $this->paginate(Item::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('items');
        }
        else{
            $items = $this->paginate(Item::orderBy('created_at', 'DESC')->get())->setPath('items');
=======
            $items = Item::orderBy('created_at', 'DESC')->where('category_id', DB::table('categories')->where('name', 'LIKE', '%'. $request->search .'%')->value('id'))->paginate(5);
        }
        else if($request->tags == 'supplier') {
            $items = Item::orderBy('created_at', 'DESC')->where('supplier_id', DB::table('suppliers')->where('name', 'LIKE', '%'. $request->search .'%')->value('id'))->paginate(5);
        }
        else if($request->has('search') && Schema::hasColumn('items', $request->tags)) {
            $items = Item::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->paginate(5);
        }
        else{
            $items = Item::orderBy('created_at', 'DESC')->paginate(5);
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        }

        if ($request->ajax()) {
            return Response::json(['success'=>true,'items'=>$items]);   
        }
<<<<<<< HEAD
        return Response::json(['success'=>true,'items'=>$items,'page'=>'items']);   
=======
        return Response::json(['success'=>true,'items'=>$items]);   
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function view(Request $request) 
    {
        $items = Item::findOrFail($request->id);
        $category = $items->category->name;
        $supplier = $items->supplier->name;
<<<<<<< HEAD
        return Response::json(['success'=>true,'item'=>$items,'category'=>$category,'supplier'=>$supplier]);  
=======
        $profit = $items->price - $items->cost; 
        return Response::json(['success'=>true,'item'=>$items,'category'=>$category,'supplier'=>$supplier, 'profit'=> $profit]);  
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function store(Request $request)
    {
        $fname = '';
        $v = Validator::make($request->all(), [
<<<<<<< HEAD
            'ref_code' => 'required|string|max:255|unique:items|unique:items',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
=======
            'ref_code' => 'required|string|max:255|unique:items|unique:menus',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            }
            
            $item = Item::create([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'description' => $request->description,
                'image' => $fname,
<<<<<<< HEAD
                'active' => $request->active,
            ]);


            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'form_name' => 'Items',
                'activity' => 'Created ' . 'Item ' . $request->name .' ('.$request->ref_code.')', 
=======
                'quantity' => $request->quantity,
                'cost' => $request->cost,
                'price' => $request->price,
            ]);

            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Updated ' . 'Item ' . $request->name, 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ]);
            return Response::json(['success'=>true,'item'=>$item]);   
        }       
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
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
<<<<<<< HEAD
=======
            'quantity' => 'required|numeric',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        ]);

        if ($v->fails()) {
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }  else {
            $items=Item::findOrFail($id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->ref_code . '.' . $file->getClientOriginalExtension();
                $file = $file->move(public_path().'/images/'.'/smalls/', $filename);
                Image::make($file->getRealPath())->resize(150, 150)->save();
                $fname = $filename;
            } else {
                $fname = $items->getImageFile();
            }

<<<<<<< HEAD
            $old_code = $items->ref_code;

=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            $items->update([
                'ref_code' => $request->ref_code,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'description' => $request->description,
                'image' => $fname,
<<<<<<< HEAD
                'active' => $request->active,
            ]); 

            Purchase::where('ref_code', $old_code)->update(['ref_code'=> $items->ref_code]);
            Inventory::where('ref_code', $old_code)->update(['ref_code'=> $items->ref_code]);

            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'form_name' => 'Items',
                'activity' => 'Updated ' . 'Item ' . $request->name .' ('.$request->ref_code.')', 
=======
                'quantity' => $request->quantity,
                'cost' => $request->cost,
                'price' => $request->price,
                'active' => $request->active,
            ]); 
             
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Items',
                            'activity' => 'Updated ' . 'Item ' . $request->name, 
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
            ]);
            return Response::json(['success'=>true,'item'=>$items]);  
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
