<?php

namespace App\Imports;

use App\Models\PackagingPO;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PackagingPOImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PackagingPO([
            'Process' => $row[4] ?? null,
            'FinishDate' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])),
            'Shift' => $row[2],
            'NumberMaterial' => $row[5],
            'Quantity' => $row[10],
            //
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
