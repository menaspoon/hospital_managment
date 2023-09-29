<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsBooking extends Model {
    protected $table = "analytics_booking";
    protected $fillable = ["id", "medical_examination", "price", "name", "created", "time"];
}


