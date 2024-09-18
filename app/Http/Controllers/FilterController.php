<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    public function employeesResign()
    {
        return view('employee.resign', [
            'employees' => Employee::where('active_status', 'resign')->paginate(5)
        ]);
    }

    public function employeesByEducation($education)
    {
        $employees = Employee::where('last_education', $education)->paginate(5);
        return view('employee.by-education', compact('employees'));
    }

    public function employeesByGender($gender)
    {
        $employees = Employee::where('gender', $gender)->paginate(5);
        return view('employee.by-gender', compact('employees', 'gender'));
    }

    public function employeesByDepartment($department)
    {
        $employees = Employee::whereHas('department', function ($query) use ($department) {
            $query->where('name', $department);
        })->paginate(5);

        return view('employee.by-department', compact('employees', 'department'));
    }

    public function employeesByLocation($location)
    {
        $employees = Employee::whereHas('location', function ($query) use ($location) {
            $query->where('code', $location);
        })->paginate(5);

        return view('employee.by-location', compact('employees', 'location'));
    }

    public function employeeBirthdayToday()
    {
        // Mendapatkan tanggal hari ini (tanpa tahun)
        $today = Carbon::now()->format('m-d');

        // Mendapatkan data karyawan yang ulang tahun hari ini
        $employees = Employee::whereRaw('DATE_FORMAT(birthdate, "%m-%d") = ?', [$today])->get();

        return view('employee.birthday-today', compact('employees'));
    }
}
