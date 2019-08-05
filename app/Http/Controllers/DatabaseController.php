<?php

namespace App\Http\Controllers;

use App\Database;
use Illuminate\Http\Request;
use Artisan;

class DatabaseController extends Controller
{
    public function index()
    {
        return view('database.index');
    }

    public function backupDatabase()
    {
        Artisan::call('db:dump');

        return view('database.index');
    }

    public function restoreDatabase(Request $request)
    {
    	$sqlfile = $request->sqlfile;

    	Artisan::call('db:restore', ['sqlfile' => $sqlfile]);
        return view('database.index');
    }
}
