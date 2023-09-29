<?php

namespace App\Models\IntensiveCare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntensiveCareDepartment extends Model {
    protected $table = "intensive_care_department";
    protected $fillable = ["id", "name", "hospital"];
}




