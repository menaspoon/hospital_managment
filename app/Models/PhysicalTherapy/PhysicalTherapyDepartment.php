<?php

namespace App\Models\PhysicalTherapy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalTherapyDepartment extends Model {

    protected $table = "physical_therapy_department";

    protected $fillable = [
        "id", "name", "hospital"
    ];

}




