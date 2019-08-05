<?php

namespace App\Http\ViewComposers;

<<<<<<< HEAD
use App\Receipt;
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ReceiptComposer {
	public function create(View $view) {		
<<<<<<< HEAD
      $receipts = Receipt::all();
=======
      $receipts = DB::table('receipts')->get();
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3

      $view->with('receipts', $receipts);
	}
}