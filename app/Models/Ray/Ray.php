<?php

namespace App\Models\Ray;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ray extends Model {

    protected $table = "ray";

    protected $fillable = [
        "id", "name", "price", "category", "status", "hospital"
    ];

}




