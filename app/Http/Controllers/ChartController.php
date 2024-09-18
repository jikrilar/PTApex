<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Title;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getDataLocation()
    {
        $data_location = Location::select('locations.code', DB::raw('COUNT(employees.nik) as employee_count'))
            ->leftJoin('employees', 'locations.id', '=', 'employees.location_id')
            ->groupBy('locations.id', 'locations.code')
            ->get();

        return response()->json($data_location);
    }

    public function getDataDepartment()
    {
        $data_department = Department::select('departments.name', DB::raw('COUNT(employees.nik) as employee_count'))
            ->leftJoin('employees', 'departments.id', '=', 'employees.department_id')
            ->groupBy('departments.id', 'departments.name')
            ->get();

        return response()->json($data_department);
    }

    // Controller: ChartController.php

    public function getGenderData()
    {
        $data = Employee::select('gender', DB::raw('COUNT(*) as count'))
            ->groupBy('gender')
            ->get();

        return response()->json($data);
    }

    public function getDataEducation()
    {
        $data_education = Employee::select('last_education', DB::raw('COUNT(*) as total'))
            ->whereIn('last_education', ['SMA', 'SMK', 'Diploma', 'S1', 'S2'])
            ->groupBy('last_education')
            ->get();

        return response()->json($data_education);
    }
    public function getDataTitle()
    {
        $data_title = Title::select('titles.name', DB::raw('COUNT(employees.nik) as employee_count'))
            ->leftJoin('employees', 'titles.id', '=', 'employees.title_id')
            ->groupBy('titles.id', 'titles.name')
            ->get();

        return response()->json($data_title);
    }

}
