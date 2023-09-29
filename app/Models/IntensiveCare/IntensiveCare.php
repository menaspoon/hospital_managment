<?php

namespace App\Models\IntensiveCare;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntensiveCare extends Model {
    protected $table = "intensive_care";
    protected $fillable = ["id", "name", "price", "category", "status", "hospital"];
}




