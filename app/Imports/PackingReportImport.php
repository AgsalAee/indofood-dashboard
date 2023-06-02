<?php

namespace App\Imports;

use App\Models\PackingReport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PackingReportImport implements WithMultipleSheets
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function sheets(): array
    {
        return [
            new FirstSheetImport(),
        ];
    }
}
