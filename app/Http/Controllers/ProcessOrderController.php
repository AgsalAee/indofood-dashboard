<?php

namespace App\Http\Controllers;

use App\Imports\ProcessOrderImport;
use App\Models\ProcessOrder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProcessOrderController extends Controller
{
    //
    public function index()
    {
        $pos = ProcessOrder::latest()->paginate(15);

        return view('pages.packaging.ProcessOrder', compact('pos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('pages.packaging.ProcessOrder');
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
        Excel::import(new ProcessOrderImport, public_path('/file_packaging/' . $nama_file));
        // membuat notifikasi dengan session
        return redirect('/ProcessOrder');
    }

    public function destroy()
    {
        return;
    }

    public function edit()
    {
        return;
    }
}
