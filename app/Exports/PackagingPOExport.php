<?php

namespace App\Exports;

use App\Models\PackagingPO;
use Maatwebsite\Excel\Concerns\FromCollection;

class PackagingPOExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PackagingPO::all();
    }
}
