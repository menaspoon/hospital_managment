<?php

namespace App\Models\Ray;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayBooking extends Model {
    protected $table = "ray_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


