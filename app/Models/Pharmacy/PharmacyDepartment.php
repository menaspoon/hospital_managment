<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyDepartment extends Model {

    protected $table = "pharmacy_department";
    protected $fillable = [
        "id",	"name",	"how_to_use", "count", "selling_price",	"buy_price", "expiration_date",	"hospital"	
    ];

}




