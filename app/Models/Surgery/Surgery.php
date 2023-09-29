<?php

namespace App\Models\Surgery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model {
    protected $table = "surgery";
    protected $fillable = ["id", "name", "price", "hospital", "updated_at"];
}

