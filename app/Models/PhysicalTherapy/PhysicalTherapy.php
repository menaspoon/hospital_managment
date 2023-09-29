<?php

namespace App\Models\PhysicalTherapy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalTherapy extends Model {

    protected $table = "physical_therapy";

    protected $fillable = [
        "id", "name", "price", "category", "status", "hospital"
    ];

}




