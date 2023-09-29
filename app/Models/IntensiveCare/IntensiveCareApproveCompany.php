<?php

namespace App\Models\IntensiveCare;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntensiveCareApproveCompany extends Model {
    protected $table = "intensive_care_approve_company";
    protected $fillable = ["item", "company", "hospital", "updated_at"];
}




