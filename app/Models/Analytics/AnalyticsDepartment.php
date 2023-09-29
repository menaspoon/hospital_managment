<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsDepartment extends Model {

    protected $table = "analytics_department";

    protected $fillable = [
        "id", "name", "hospital"
    ];

}




