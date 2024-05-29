<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleAnalysis extends Model
{
    protected $table = 'vehicle_analysis';
    protected $fillable = [
        'customer_name', 'customer_mobile', 'address', 'city', 'state',
        'referred_by', 'referred_mobile', 'vehicle_size', 'type_of_work',
        'sector', 'work_description', 'reviewed_by','department','others','location','work_category'
    ];
}