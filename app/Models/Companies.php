<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model {
    
    protected $table = "companies";
    protected $fillable = [
        "id",	"name", "email", "count", "start", "end", "total", "year", "discount_percentage"
    ];

}




