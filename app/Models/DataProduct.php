<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataProduct extends Model
{
    use HasFactory, Notifiable;

    // protected $with = ['PackingReports'];
    protected $table = "data_products";

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id',
        'product_name',
        'product_total',
        'product_mix_weight',
        'product_addition_weight',
        'product_bg_weight',
        'product_si_weight',
        'product_etiquete_weight',
        'product_RPM',
        'product_pitch'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $casts = [
        'product_id' => 'integer'
    ];

    public function PackingReports()
    {
        return $this->hasMany(PackingReport::class);
    }

    // public function MaterialType()
    // {
    //     return $this->hasOne(MaterialType::class);
    // }

    public function MachineNumbers()
    {
        return $this->belongsToMany(MachineNumber::class);
    }

    public function ProcessOrders()
    {
        return $this->belongsTo(ProcessOrder::class);
    }
}
