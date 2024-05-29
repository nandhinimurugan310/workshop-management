<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';

    protected $fillable = [
        'purchase_id',
        'vehicle_id',
        'supplier_id',
        'status'
    ];

    // Define relationships
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Vendor::class);
    }
}
