<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SystemSettingComposer {
	public function create(View $view) {		
		$setting = DB::table('system_settings')->first();;
		$view->with('setting', $setting);
	}
}