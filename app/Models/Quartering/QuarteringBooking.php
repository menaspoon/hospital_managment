<?php

namespace App\Models\Quartering;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarteringBooking extends Model {
    protected $table = "quartering_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


