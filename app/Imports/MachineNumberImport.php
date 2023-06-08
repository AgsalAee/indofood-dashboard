<?php

namespace App\Imports;

use App\Models\MachineNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class MachineNumberImport implements WithMultipleSheets
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function sheets(): array
    {
        return [
            new SecondMachNumberImport(),
        ];
    }
}
