<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model {


    protected $table = "hospital";
    protected $fillable = [
        "id", "name",	"email", "phone", "logo", "subscription",  "discount_percentage", "start", "end", "created"	
    ];

}




