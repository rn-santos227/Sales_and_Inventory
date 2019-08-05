<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Discount;
use App\AuditTrail;
use App\Company;
use Carbon;
use PDF;
use DB;
use Auth;
use Response;
use Excel;

=======
use Illuminate\Support\Facades\Validator;
use App\Discount;
use App\AuditTrail;
use Auth;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
<<<<<<< HEAD

    public function pdfview(Request $request)
    {
        $items = DB::table("discounts")->get();
        view()->share('items',$items);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('discounts.pdf');
            return $pdf->download('Discounts-'.Carbon\Carbon::now().'.pdf');
        }
        return view('discounts.pdf');

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
                        Discount::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'rate' => $value->rate,
                            'description' => $value->description,
                        ]);
                        $records++;
                    } catch (\Exception $ex) {
                        continue;
                    } 
                }                  
            } 

            $discounts = $this->paginate(Discount::orderBy('created_at', 'DESC')->get())->setPath('discounts');
            return Response::json(['success'=>$success,'discounts'=>$discounts, 'records'=>$records]);
        }
    } 

    protected function paginate($discounts, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the discounts to display in current page
        $currentPageDiscounts = $discounts->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPageDiscounts, count($discounts), $perPage);
    }
=======
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
<<<<<<< HEAD
        //Index function
        $discounts = Discount::paginate(5);
        if ($request->ajax()) {
            return view('discounts.data', compact('discounts'));
        }
        return view('discounts.index', compact('discounts'));
    }

    public function search(Request $request)
    {

        $discounts;
        if($request->has('search') && Schema::hasColumn('discounts', $request->tags)) {
            $discounts = $this->paginate(Discount::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('discounts');
        }
        else{
            $discounts = $this->paginate(Discount::orderBy('created_at', 'DESC')->get())->setPath('discounts');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'discounts'=>$discounts]);
        }
        return Response::json(['success'=>true,'discounts'=>$discounts]);
    }

    public function view(Request $request)
    {

        $discount = Discount::findOrFail($request->id);
        return Response::json(['success'=>true,'discount'=>$discount]);
    }
=======
        // search discounts
        if($request->has('search')) {
            $discounts = Discount::where($request->input('tag'), 'LIKE', '%'. $request->input('search') . '%')->paginate(5);
        }
        else {
            $discounts = Discount::paginate(5);
        }
        return view('discounts.index',compact('discounts'));
    }

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discounts.create');
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
            'ref_code' => 'required|string|max:255|unique:discounts',
<<<<<<< HEAD
            'rate' => 'required|numeric',
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {     
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $discounts = Discount::create($request->all());
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Discounts',
                                'activity' => 'Created ' . 'Discount ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'discounts'=>$discounts]);           
        }
=======
            'name' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }
        Discount::create($request->all());
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Discounts',
                            'activity' => 'Created ' . 'Discount ' . $request->name, 
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
<<<<<<< HEAD
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'name' => 'required|string|max:255'
        ]);

        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $discounts = Discount::findOrFail($id);
            $discounts->update($request->all());  
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Discount',
                                'activity' => 'Updated ' . 'Discount ' . $request->name, 
            ]);
            return Response::json(['success'=>true, 'discounts'=>$discounts]);
        } 
=======
        $discounts = Discount::findOrFail($id);
        $discounts->update($request->all());  
        AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Discounts',
                            'activity' => 'Updated ' . 'Discount ' . $request->name, 
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
