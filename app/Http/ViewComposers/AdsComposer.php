<?php

namespace App\Http\ViewComposers;

use App\Ad;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdsComposer {
	public function create(View $view) {		
	 	$ads = Ad::first();
      	$view->with('ads', $ads);
	}
}