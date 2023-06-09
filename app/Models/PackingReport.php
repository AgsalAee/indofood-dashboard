<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackingReport extends Model
{
    use HasFactory;
    protected $table = "packing_reports";
    // protected $primaryKey = 'uuid';
    protected $fillable = [
        'product_id',
        'name_product',
        'total_product',
        'packing_boxShA',
        'packing_boxShB'
    ];

    protected $hidden = [
        'report_id'
    ];

    protected $cast = [
        'product_id' => 'integer',
        'name_product' => 'string',
        'total_product' => 'string'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
