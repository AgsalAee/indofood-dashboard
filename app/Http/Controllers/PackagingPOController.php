<?php

namespace App\Http\Controllers;

use App\Exports\PackagingPOExport as ExportsPackagingPOExport;
use App\Models\PackagingPO;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\PackagingPOImport as ImportsPackagingPOImport;


class PackagingPOController extends Controller
{
    public function index()
    {
        return view('pages.packaging.PackagingPO');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();
        $file->move('file_packaging', $nama_file);
        Excel::import(new ImportsPackagingPOImport, public_path('/file_packaging/' . $nama_file));
        // membuat notifikasi dengan session
        return redirect('/PackagingPO');
    }
    public function export_excel()
    {
        return Excel::download(new ExportsPackagingPOExport, date('Y-m-d H:i:s') . '_PO_Packaging.xlsx');
    }
}
