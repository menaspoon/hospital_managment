<?php

namespace App\Models\IntensiveCare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntensiveCareBooking extends Model {
    protected $table = "intensive_care_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


