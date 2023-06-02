<?php

namespace App\Imports;

use App\Models\PackingReport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FirstSheetImport implements ToModel, WithCalculatedFormulas, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[1]) | !isset($row[4])) {
            return null;
        }
        return new PackingReport([
            'product_id' => $row[1],
            'name_product' => $row[4],
            'total_product' => $row[7],
            'packing_boxShA' => $row[9],
            'packing_boxShB' => $row[13],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
    // public function rules(): array
    // {
    //     return [
    //         'product_id' => [
    //             'required',
    //             'integer',
    //         ],
    //     ];
    // }
}
