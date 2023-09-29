<?php

namespace App\Models\Ray;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayApproveCompany extends Model {
    protected $table = "ray_approve_company";
    protected $fillable = ["item", "company", "hospital", "updated_at"];
}




