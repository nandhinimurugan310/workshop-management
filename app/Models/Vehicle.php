<?php


// Vehicle.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	protected $table = 'vehicle';
        protected $fillable = ['vehicle_number', 'vehicle_image', 'analysis_id','vehicle_status'];

    public function analysis()
    {
        return $this->belongsTo(VehicleAnalysis::class, 'analysis_id');
    }


    public function materialAllocations() {
        return $this->hasMany(MaterialAllocation::class,'vehicle_id');
    }

}
