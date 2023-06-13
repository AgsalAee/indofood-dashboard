<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialType extends Model
{
    use HasFactory;
    protected $table = 'material_types';
    protected $fillable = [
        'product_mat_id',
        'material_name',
        'product_description',
        'material_type'
    ];

    public function DataProduct()
    {
        return $this->belongsTo(DataProduct::class);
    }
}
