<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineBooking extends Model {
    protected $table = "online_booking";
    protected $fillable = ["name", "date", "diagnosing", "note", "hospital"];
}


