<?php

namespace App\Models\MedicalExamination;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExaminationBooking extends Model {
    
    protected $table = "medical_examination_booking";
    protected $fillable = [
        "id",	"name", "medical_examination",  "hospital"
    ];

}




