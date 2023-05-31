<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingPO extends Model
{
    use HasFactory;

    protected $table = "packaging_p_o_s";
    protected $fillable = [
        'Process',
        'FinishDate',
        'Shift',
        'NumberMaterial',
        'Quantity',
    ];
}
