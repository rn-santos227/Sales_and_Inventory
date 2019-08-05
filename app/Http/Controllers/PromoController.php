<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Promo;
use App\AuditTrail;
use App\Company;
use Carbon;
use PDF;
use DB;
use Auth;
use Response;
use Excel;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
                        Promo::create([
                            'name' => $value->name,
                            'ref_code' => $value->ref_code,
                            'type' => $value->type,
                            'value' => $value->value,
                            'expiration_date' => $value->expiration_date,                  
                            'description' => $value->description,
                        ]);
                        $records++;
                    } catch (\Exception $ex) {
                        continue;
                    } 
                }                  
            } 

            $promos = $this->paginate(Promo::orderBy('created_at', 'DESC')->get())->setPath('promos');
            return Response::json(['success'=>$success,'promos'=>$promos, 'records'=>$records]);
        }
    }

    public function pdfview(Request $request)
    {
        $promos = DB::table("promos")->get();
        view()->share('promos',$promos);
        view()->share('company', Company::all()->first());
        
        if($request->has('download')){

            $pdf = PDF::loadView('promos.pdf');
            AuditTrail::create(['user_id' => Auth::user()->id,
                            'username' => Auth::user()->username,
                            'form_name' => 'Promos',
                            'activity' => 'Downloaded ' . 'Promos List', 
            ]);
            return $pdf->download('promos-'.Carbon\Carbon::now().'.pdf');
        }
        return view('promos.pdf');

    }

    protected function paginate($promos, $perPage = 5)
    {
        //Get current page form url e.g. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Slice the collection to get the promos to display in current page
        $currentPagepromos = $promos->slice(($currentPage - 1) * $perPage, $perPage);

        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($currentPagepromos, count($promos), $perPage);
    }         

    public function index(Request $request)
    {
        //Index function
        $promos = Promo::paginate(5);
        if ($request->ajax()) {
            return view('promos.data', compact('promos'));
        }
        return view('promos.index', compact('promos'));
    }

    public function search(Request $request) {
        $promos;
        if($request->has('search') && Schema::hasColumn('promos', $request->tags)) {
            $promos = $this->paginate(Promo::orderBy('created_at', 'DESC')->where($request->tags, 'LIKE', '%'. $request->search . '%')->get())->setPath('promos');
        }
        else{
            $promos = $this->paginate(Promo::orderBy('created_at', 'DESC')->get())->setPath('promos');
        }

        if ($request->ajax()) {
             return Response::json(['success'=>true,'promos'=>$promos]);
        }
        return Response::json(['success'=>true,'promos'=>$promos]);
    }

    public function view(Request $request)
    {

        $promo = Promo::findOrFail($request->id);
        return Response::json(['success'=>true,'promo'=>$promo]);
    }

    public function create()
    {
        return view('promos.create');
    }


    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255|unique:promos',
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'expiration_date' => 'required|after:' . date('Y-m-d') . '|date_format:Y-m-d',
            'description' => 'required|string|max:255',
        ]);

        if ($v->fails()) {     
            return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $promos = Promo::create($request->all());
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Promos',
                                'activity' => 'Created ' . 'Promo ' . $request->name, 
            ]);
            return Response::json(['success'=>true,'promos'=>$promos]);  
        }
    }


    public function show(Promo $promo)
    {
        //
    }


    public function edit(Promo $promo)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'ref_code' => 'required|string|max:255',
            'type' => 'required|string',
            'name' => 'required|string|max:255',
            'value' => 'required|numeric',
            'expiration_date' => 'required|after:' . date('Y-m-d') . '|date_format:Y-m-d',
            'description' => 'required|string|max:255',
        ]);

        if ($v->fails()) {
             return response()->json(['success'=>false,'errors'=>$v->errors()]);
        }

        else {
            $promos = Promo::findOrFail($id);
            $promos->update($request->all());  
            AuditTrail::create(['user_id' => Auth::user()->id,
                                'username' => Auth::user()->username,
                                'form_name' => 'Promos',
                                'activity' => 'Updated ' . 'Promo ' . $request->name, 
            ]);
            return Response::json(['success'=>true, 'promos'=>$promos]);
        } 
    }

    public function destroy(Promo $promo)
    {
        //
    }
}
