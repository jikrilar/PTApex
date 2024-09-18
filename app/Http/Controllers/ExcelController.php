<?php

namespace App\Http\Controllers;

use App\Imports\CandidateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\CandidateExport;

class ExcelController extends Controller
{
    public function showUploadForm()
    {
        return view('candidate.import-excel');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        // Import data
        Excel::import(new CandidateImport, $request->file('file'));

        Alert::success('success!', 'berhasil mengimport data excel candidate');
        return redirect()->route('candidate.index');
    }

    public function export()
    {
        return Excel::download(new CandidateExport, 'employees.xlsx');
    }
}
