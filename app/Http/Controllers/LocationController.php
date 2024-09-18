<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Location;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *@return \Illuminate\View\View
     */
    public function index()
    {
        return view('location.index', [
            'locations' => Location::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('location.create');
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
            'brand' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'city' => 'required',
            'address' => 'required',
            'area' => 'required',
        ]);

        Location::create($data);

        Alert::success('Success!', 'Data lokasi telah ditambahkan');
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *  @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('location.show-employee', [
            'location' => Location::find($id),
            'employee_locations' => Employee::where('location_id', $id)->get()
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
        return view('location.edit', [
            'location' => Location::find($id)
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
            'brand' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'city' => 'required',
            'address' => 'required',
            'area' => 'required',
        ]);

        Location::find($id)->update($data);

        Alert::success('Success!', 'Data lokasi telah dirubah');
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::destroy($id);

        Alert::success('Success!', 'Data lokasi telah dihapus');
        return redirect()->route('location.index');
    }
}
