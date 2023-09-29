<?php

namespace App\Models\Emergency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyDepartment extends Model {

    protected $table = "emergency_department";

    protected $fillable = [
        "id", "name", "hospital"
    ];

}




