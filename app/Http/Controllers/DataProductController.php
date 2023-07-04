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
        // return view('pages.packaging.DataProduct');
    }

    public function create()
    {
        return view('pages.packaging.DataProduct.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required',
            'product_name' => 'required',
            'product_total' => 'required',
            'product_mix_weight' => 'required',
            'product_addition_weight' => 'required',
            'product_bg_weight' => 'required',
            'product_si_weight' => 'required',
            'product_etiquete_weight' => 'required',
            'product_RPM' => 'required',
            'product_pitch' => 'required',
        ]);

        DataProduct::create($request->all());

        return redirect()->route('DataProduct.index')
            ->with('success', 'Product created successfully.');
    }

    // public function show(DataProduct $product): View
    // {
    //     return view('pages.packaging.DataProduct', compact('product'));
    // }

    public function edit($product_id): View
    {

        $product = DataProduct::findOrFail($product_id);

        return view('pages.packaging.DataProduct.edit', compact('product'));
    }

    public function update(Request $request, $product_id): RedirectResponse
    {
        $product = DataProduct::findOrFail($product_id);

        $product->update([
            'product_name' => $request->product_name,
            'product_total' => $request->product_total,
            'product_mix_weight' => $request->product_mix_weight,
            'product_addition_weight' => $request->product_addition_weight,
            'product_bg_weight' => $request->product_bg_weight,
            'product_si_weight' => $request->product_si_weight,
            'product_etiquete_weight' => $request->product_etiquete_weight,
            'product_RPM' => $request->product_RPM,
            'product_pitch' => $request->product_pitch,
        ]);

        return redirect()->route('DataProduct.index')
            ->with('success', 'Product edited successfully');
    }


    public function destroy($product_id): RedirectResponse
    {
        $product = DataProduct::findOrFail($product_id);

        $product->delete();

        return redirect()->route('DataProduct.index')
            ->with('success', 'Product deleted successfully');
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
