<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineNumber extends Model
{
    use HasFactory;

    protected $table = 'machine_numbers';

    protected $fillable = [
        'machine_id',
        'status',
        'id_group',
        'id_product_code',
        'id_downtime'
    ];

    protected $cast = [
        'status' => 'boolean',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function MachineGroups()
    {
        return $this->belongsTo(MachineGroup::class);
        # code...
    }
}
