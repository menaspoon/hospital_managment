<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model {

    protected $table = "analytics";

    protected $fillable = [
        "id", "name", "price", "category", "status", "hospital"
    ];

}




