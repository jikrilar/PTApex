<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Department;
use App\Models\Presence;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'locations' => Location::all(),
            'employeeTotal' => Employee::count(),
            'locationTotal' => Location::count(),
            'departmentTotal' => Department::count(),
            'presenceCount' => Presence::count()
        ]);
    }
}
