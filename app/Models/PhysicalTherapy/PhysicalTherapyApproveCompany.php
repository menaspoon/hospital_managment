<?php

namespace App\Models\PhysicalTherapy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalTherapyApproveCompany extends Model {
    protected $table = "physical_therapy_approve_company";
    protected $fillable = ["item", "company", "precent", "hospital", "updated_at"];
}




