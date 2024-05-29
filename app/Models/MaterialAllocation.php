<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialAllocation extends Model
{
    protected $table = 'material_allocation';
    protected $fillable = [
        'vehicle_id',
        'material_name',
        'brand',
        'quantity',
        'unit_of_measurement',
        'work_type',
        'supplier_id',
    ];

  public function vehicle()
    {
         return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

  
}
