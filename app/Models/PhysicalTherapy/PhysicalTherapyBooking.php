<?php

namespace App\Models\PhysicalTherapy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalTherapyBooking extends Model {
    protected $table = "physical_therapy_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


