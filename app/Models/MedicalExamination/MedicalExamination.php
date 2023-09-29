<?php

namespace App\Models\MedicalExamination;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExamination extends Model {
    
    protected $table = "medical_examination";
    protected $fillable = [
        "id",	"name", "category",  "hospital"
    ];

}




