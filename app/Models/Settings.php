<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model {


    protected $table = "settings";

    protected $fillable = [
        "hospital",	"service_cost",	"discount_percentage", "taxes",	"receive_payments"	
    ];

}


