<?php

namespace App\Models\Emergency;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyApproveCompany extends Model {
    protected $table = "emergency_approve_company";
    protected $fillable = ["item", "company", "hospital", "updated_at"];
}




