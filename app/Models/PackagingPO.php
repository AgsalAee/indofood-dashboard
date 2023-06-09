<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingPO extends Model
{
    use HasFactory;

    protected $table = "packaging_p_o_s";
    protected $fillable = [
        'process_id',
        'finish_date',
        'shift',
        'number_material',
        'quantity',
    ];
}
