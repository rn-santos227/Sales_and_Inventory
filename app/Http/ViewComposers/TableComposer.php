<?php

namespace App\Http\ViewComposers;

use App\Table;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Employee;
use App\Customer;

class TableComposer {
	public function create(View $view) {		
		$vacant = Table::where('status','vacant')->get();
                $occupied = Table::where('status','reserved')
                ->orwhere('status','occupied')->get();

                $employees = Employee::where([
                	['active', 1],
                	['designation','waiter'],
                	['present', 1],
                ])->get();
                $customers = Customer::where('active','1')->get();

	       $view->with('vacant', $vacant);
	       $view->with('occupied', $occupied);
	       $view->with('employees', $employees);
	       $view->with('customers', $customers);

        }
}