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

    protected $fillable = [
        'product_id',
        'product_name',
        'product_total',
        'product_mix_weight',
        'product_addition_weight',
        'product_si_weight',
        'product_etiquete_weight',
        'product_RPM',
        'product_pitch'
    ];

    protected $hidden = [
        'product_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'product_id' => 'integer'
    ];

    public function PackingReports()
    {
        return $this->hasMany(PackingReport::class);
    }
}
