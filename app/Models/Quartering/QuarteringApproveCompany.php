<?php

namespace App\Models\Quartering;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarteringApproveCompany extends Model {
    protected $table = "quartering_approve_company";
    protected $fillable = ["item", "company", "precent", "hospital", "updated_at"];
}




