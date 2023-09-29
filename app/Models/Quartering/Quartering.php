<?php

namespace App\Models\Quartering;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartering extends Model {

    protected $table = "quartering";

    protected $fillable = [
        "id", "name", "price", "category", "status", "hospital"
    ];

}




