<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ItemComposer {
	public function create(View $view) {		
      $categories = DB::table('categories')->where('active', 1)->get();
      $suppliers = DB::table('suppliers')->where('active', 1)->get();
      $discounts = DB::table('discounts')->where('active', 1)->get();

      $view->with('categories', $categories);
      $view->with('suppliers', $suppliers);
      $view->with('discounts', $discounts);
	}
}