<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineGroup extends Model
{
    use HasFactory;

    protected $table = 'machine_groups';

    protected $fillable = [
        'group_id',
        'machine_group_line',
        'machine_group_type'
    ];


    public function MachineNumbers()
    {
        return $this->hasMany(MachineNumber::class);
        # code...
    }
}
