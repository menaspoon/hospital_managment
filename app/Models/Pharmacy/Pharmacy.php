<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model {

    protected $table = "pharmacy";
    protected $fillable = [
        "id",	"name",	"how_to_use", "count", "selling_price",	"buy_price", "expiration_date",	"hospital"	
    ];

}




