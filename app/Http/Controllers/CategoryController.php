<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Category;
use App\AuditTrail;
<<<<<<< HEAD
use App\Company;
use Carbon;
use PDF;
use DB;
use Excel;
use Auth;
use Response;
=======
use Auth;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
<<<<<<< HEAD
    }
    public function pdfview(Request $request)
    {
        $items = DB::table("categories")->get();
        view()->share('items',$items);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('categories.pdf');
            return $pdf->download('Categories-'.Carbon\Carbon::now().'.pdf');
        }
        return view('categories.pdf');

    }
    public function batch(Request $request) {
        $success = true;
        $show_error = false;
        $records = 0;

        $v = Validator::make($request->all(), [
            'excel' => 'required|mimes:xls,xlsx',
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
                    try {
                        Category::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'description' => $value->description,
                        ]);
                        $records++;
                    }

                    catch (\Exception $ex) {
                        continue;
                    }
                }
            }                

            $categories = $this->paginate(Category::orderBy('created_at', 'DESC')->get())->setPath('categories');
            return Response::json(['success'=>$success,'categories'=>$categories, 'records'=>$records]);
        }
    }

    public function downloadExcel($type) {
        $items = Item::get()->toArray();
        return Excel::create('category_list', function($excel) use ($items) {
            $excel->sheet('sheet name', function($sheet) use ($items)
            {
                $sheet->fromArray($items);
            });
        })->download($type);
    } 

    protected function paginate($categories, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the categories to display in current page
        $currentPagecategories = $categories->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPagecategories, count($categories), $perPage);
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    }

    public function index(Request $request)
    {
<<<<<<< HEAD
        //Index function
        $categories = $this->paginate(Category::orderBy('created_at', 'DESC')->get())->setPath('categories');
        if ($request->ajax()) {
            return view('categories.data', compact('categories'));
        }
=======
        //For search function
        if($request->has('search') && Schema::hasColumn('categories', $request->input('tags'))) {
            $categories = Category::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else{
            $categories = Category::paginate(5);
        }

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        return view('categories.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $categories;
        if($request->has('search') && Schema::hasColumn('categories', $request->tags)) {
            $categories = $this->paginate(Category::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('categories');
        }
        else{
            $categories = $this->paginate(Category::orderBy('created_at', 'DESC')->get())->setPath('categories');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'categories'=>$categories]);
        }
        return Response::json(['success'=>true,'categories'=>$categories]);
    }

    public function view(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return Response::json(['success'=>true,'category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:categories',
            'name' => 'required|string|max:255',
        ]);
<<<<<<< HEAD

        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        } 
        else {
            $categories = Category::create($request->all());
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Category',
                                'activity' => 'Created ' . 'Category ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'categories'=>$categories]);
        }
=======

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        
        Category::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Category',
                            'activity' => 'Created ' . 'Category ' . $request->name, 
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
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'name' => 'required|string|max:255'
        ]);

<<<<<<< HEAD
        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $categories = Category::findOrFail($id);
            $categories->update($request->all());  
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Category',
                                'activity' => 'Updated ' . 'Category ' . $request->name, 
            ]);
            return Response::json(['success'=>true, 'categories'=>$categories]);
        } 
=======
        $categories = Category::findOrFail($id);
        $categories->update($request->all());  

        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Category',
                            'activity' => 'Updated ' . 'Category ' . $request->name, 
        ]);

        return redirect()->back();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
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
