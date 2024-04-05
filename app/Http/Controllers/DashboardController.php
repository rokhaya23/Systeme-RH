<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $employeeCount = Employee::count();
        $departmentCount = 5;
        $contracts = Contrat::select('type_contrat', \DB::raw('COUNT(*) as count'))
            ->groupBy('type_contrat')
            ->get();

        return view('dashboard', compact('employeeCount', 'departmentCount','contracts'));
    }

}
