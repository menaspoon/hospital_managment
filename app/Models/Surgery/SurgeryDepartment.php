<?php

namespace App\Models\Surgery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryDepartment extends Model {
    protected $table = "surgery_department";
    protected $fillable = [	"id", "name", "hospital", "updated_at"];
}

