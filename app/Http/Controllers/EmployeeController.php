<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Title;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('employee.index', [
            'employees' => Employee::with(['department', 'location', 'title'])->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employee.create', [
            'departments' => Department::all(),
            'locations' => Location::all(),
            'titles' => Title::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'ktp_number' => 'required',
            'ktp_photo' => 'required',
            'kk_number' => 'required',
            'telp' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'photo' => 'required',
            'blood_type' => 'required',
            'join_date' => 'required',
            'status' => 'required',
            'bank' => 'required',
            'account_number' => 'required',
            'bpjs_number' => 'required',
            'last_education' => 'required',
            'education_place' => 'required',
            'education_city' => 'required',
            'graduation_year' => 'required',
            'last_experience' => 'required',
            'working_period' => 'required',
            'last_title' => 'required',
            'last_job_description' => 'required',
            'skill' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
            'title_id' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }

        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
            $data['ktp_photo'] = $ktpPhotoPath;
        }

        Employee::create($data);

        Alert::success('Success!', 'Data Berhasil Ditambahkan');
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('employee.show', [
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('employee.edit', [
            'departments' => Department::all(),
            'locations' => Location::all(),
            'titles' => Title::all(),
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'ktp_number' => 'required',
            'kk_number' => 'required',
            'telp' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'emergency_contact' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'blood_type' => 'required',
            'join_date' => 'required',
            'status' => 'required',
            'bank' => 'required',
            'account_number' => 'required',
            'bpjs_number' => 'required',
            'last_education' => 'required',
            'education_place' => 'required',
            'education_city' => 'required',
            'graduation_year' => 'required',
            'last_experience' => 'required',
            'working_period' => 'required',
            'last_title' => 'required',
            'last_job_description' => 'required',
            'skill' => 'required',
            'location_id' => 'required',
            'department_id' => 'required',
            'title_id' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }

        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
            $data['ktp_photo'] = $ktpPhotoPath;
        }

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        Employee::find($id)->update($data);

        Alert::success('Success!', 'Data Karyawan Telah Dirubah');
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destory($id);

        Alert::success('Success!', 'Data Karyawan Telah Dihapus');
        return redirect()->route('employee.index');
    }
}
