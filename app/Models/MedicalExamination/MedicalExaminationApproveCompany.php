<?php

namespace App\Models\MedicalExamination;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalExaminationApproveCompany extends Model {
    protected $table = "medical_examination_approve_company";
    protected $fillable = ["item", "precent", "company", "hospital"];
}




