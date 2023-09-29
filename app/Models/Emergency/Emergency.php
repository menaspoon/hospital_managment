<?php

namespace App\Models\Emergency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model {
    protected $table = "emergency";
    protected $fillable = [
        "id", "name", "price", "category", "status", "hospital"
    ];
}




