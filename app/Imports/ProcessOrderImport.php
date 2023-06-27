<?php

namespace App\Imports;

use App\Models\ProcessOrder;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProcessOrderImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (!array_filter($row)) {
            return null;
        }

        return new ProcessOrder([
            'po_id' => $row[4] ?? null,
            'finish_date' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])),
            'shift' => $row[2],
            'number_material' => $row[5],
            'quantity' => $row[10],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
