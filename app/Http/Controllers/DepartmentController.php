<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('department.index', [
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('department.create');
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
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Department::create($data);

        Alert::success('berhasil', 'data department telah ditambahkan');
        return redirect()->route('department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *@return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('department.show-employee', [
            'department_employees' => Employee::where('department_id', $id)->paginate(5),
            'department' => Department::find($id)
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
        return view('department.edit', [
            'department' => Department::find($id)
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
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Department::find($id)->update($data);

        Alert::success('berhasil', 'nama department telah diupdate');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        Alert::success('berhasil', 'data department telah dihapus');
        return redirect()->route('department.index');
    }
}
