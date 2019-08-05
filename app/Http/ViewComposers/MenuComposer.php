<?php

namespace App\Http\ViewComposers;

use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MenuComposer {
	public function create(View $view) {		
	 	$menus = Menu::whereActive('1')->get();

      	$view->with('menus', $menus);
	}
}