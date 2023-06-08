<?php

namespace App\Http\Controllers;

use App\Models\MachineNumber;
use Illuminate\Http\Request;

class MachineNumberController extends Controller
{
    public function index()
    {
        // $products = MachineNumber::latest()->paginate(15);

        // return view('pages.machine.machinenumber', compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        return view('pages.machine.machinenumber');
    }
}
