<?php

namespace App\Models\Quartering;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarteringDepartment extends Model {

    protected $table = "quartering_department";

    protected $fillable = [
        "id", "name", "hospital"
    ];

}




