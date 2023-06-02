<?php

namespace App\Http\Controllers;

use App\Imports\PackingReportImport;
use App\Models\PackingReport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PackingReportController extends Controller
{
    public function index()
    {
        $reports = PackingReport::paginate(2);

        return view('pages/packaging/PackingReport', compact('reports'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('PackingReport');
    }


    //masih belum bisa import karena FK
    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_packaging', $nama_file);
        Excel::import(new PackingReportImport, public_path('/file_packaging/' . $nama_file));
        // membuat notifikasi dengan session
        return redirect('pages/packaging/PackingReport');
    }
}
