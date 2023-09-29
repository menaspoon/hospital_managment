<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model {
    protected $table = "banks";
    protected $fillable = ["id", "name", "balance", "hospital"];
}


