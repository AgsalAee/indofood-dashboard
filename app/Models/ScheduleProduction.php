<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleProduction extends Model
{
    use HasFactory;

    protected $table = 'schedule_productions';
    protected $fillable = [
        'product_id',
        'name_product',
        'RPM_product',
        'pitch_product',
        'shift',
        'production_hours',
        'machines_in_operation',
        'machine_number',
        'tp_number',
        'schedule_date'
    ];

    protected $hidden = [
        'id_schedule',
        'created_at',
        'updated_at'
    ];

    public function MachineNumbers()
    {
        return $this->hasMany(MachineNumber::class);
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($machine) {
    //         if ($machine->id_product) {
    //             $product = DataProduct::find($machine->id_product);
    //             $machine->product_name = $product->name;
    //         }
    //     });
    // }
}
