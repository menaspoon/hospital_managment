<?php

namespace App\Models\Surgery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryApproveCompany extends Model {
    protected $table = "surgery_approve_company";
    protected $fillable = ["item", "precent", "company", "hospital", "updated_at"];
}




