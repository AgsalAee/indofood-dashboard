<?php

namespace App\Imports;

use App\Models\MachineNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SecondMachNumberImport implements ToModel, WithCalculatedFormulas, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // if (!isset($row[1]) | !isset($row[4])) {
        //     return null;
        // }
        return new MachineNumber([
            // 'product_id' => $row[1],
            // 'name_product' => $row[4],
            // 'total_product' => $row[7],
            // 'packing_boxShA' => $row[9],
            // 'packing_boxShB' => $row[13],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
