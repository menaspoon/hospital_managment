<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model {
    protected $table = "absence";
    protected $fillable = ["id", "user", "status", "departure", "overtime", "vacation", "month", "date", "attendance_time", "time_departure", "updated_at"];
}


