<?php

namespace App\Models\Emergency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyBooking extends Model {
    protected $table = "emergency_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


