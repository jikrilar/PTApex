<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Employee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('title.index', [
            'titles' => Title::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('title.create');
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
            'name' => 'required'
        ]);

        Title::create($data);

        Alert::success('berhasil', 'data title telah ditambahkan');
        return redirect()->route('title');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *@return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('title.show-employee', [
            'title_employees' => Employee::where('title_id', $id)->paginate(5),
            'title' => Title::find($id)
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
        return view('title.edit', [
            'title' => Title::find($id)
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
            'name' => 'required'
        ]);

        Title::find($id)->update($data);

        Alert::success('berhasil', 'nama title telah diupdate');
        return redirect()->route('title.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Title::destroy($id);

        Alert::success('berhasil', 'data title telah dihapus');
        return redirect()->route('title.index');
    }
}
