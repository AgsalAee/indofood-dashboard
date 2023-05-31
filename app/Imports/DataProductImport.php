<?php

namespace App\Imports;

use App\Models\DataProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataProductImport implements ToModel, WithStartRow, WithMultipleSheets
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new DataProduct([
            'product_id' => $row[3] ?? null,
            'product_name' => $row[2],
            'product_total' => $row[15],
            'product_mix_weight' => $row[4],
            'product_addition_weight' => $row[6],
            'product_si_weight' => $row[7],
            'product_etiquete_weight' => $row[14],
            'product_RPM' => $row[23],
            'product_pitch' => $row[22]
        ]);
    }

    public function startRow(): int
    {
        return 1;
    }

    public function sheets(): array
    {
        return [
            // 0 => new FirstSheetImport()
            0 => $this,
        ];
    }
}
