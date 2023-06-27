<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessOrder extends Model
{
    use HasFactory;

    protected $table = "process_orders";

    // protected $primaryKey = "po_id";

    protected $fillable = [
        'po_id',
        'finish_date',
        'shift',
        'number_material',
        'quantity'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
