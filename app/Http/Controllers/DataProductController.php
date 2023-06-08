<?php

namespace App\Http\Controllers;

use App\Imports\DataProductImport;
use App\Models\DataProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataProductController extends Controller
{
    public function index()
    {
        $products = DataProduct::latest()->paginate(15);

        return view('pages.packaging.DataProduct', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('DataMaterial');
    }

    public function create()
    {
        return view('pages.packaging.DataProduct/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'product_total' => 'required',
            'product_mix_weight' => 'required',
            'RPM' => 'required',
        ]);

        DataProduct::create($request->all());

        return redirect()->route('DataProduct')
            ->with('success', 'Product created successfully.');
    }

    public function show(DataProduct $product): View
    {
        return view('pages.packaging.DataProduct', compact('product'));
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
        Excel::import(new DataProductImport, public_path('/file_packaging/' . $nama_file));
        // membuat notifikasi dengan session
        return redirect('/DataProduct');
    }
}
