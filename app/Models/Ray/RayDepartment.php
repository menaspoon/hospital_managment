<?php

namespace App\Models\Ray;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayDepartment extends Model {

    protected $table = "ray_department";

    protected $fillable = [
        "id", "name", "hospital"
    ];

}




