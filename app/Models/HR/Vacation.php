<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model {
    protected $table = "vacation";
    protected $fillable = ["id", "user", "start", "end", "reason", "note", "status", "hospital", "date", "created"];
}
