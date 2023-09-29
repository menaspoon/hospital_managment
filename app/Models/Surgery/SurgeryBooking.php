<?php

namespace App\Models\Surgery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryBooking extends Model {
    protected $table = "surgery_booking";
    protected $fillable = [	"id", "booking", "price", "name", "created", "time", "hospital", "status", "updated_at"];
}

