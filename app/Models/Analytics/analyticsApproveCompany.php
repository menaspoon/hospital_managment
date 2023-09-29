<?php

namespace App\Models\Analytics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analyticsApproveCompany extends Model {
    protected $table = "analytics_approve_company";
    protected $fillable = ["item", "company", "hospital", "updated_at"];
}




