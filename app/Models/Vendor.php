<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'vendor';

    // Define the fillable fields
    protected $fillable = [
        'vendor_id',
        'name',
        'email',
        'tax_number',
        'contact',
        'billing_name',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_phone',
        'billing_country'
    ];
}
