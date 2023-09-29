<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model {
    protected $table = "tools";
    protected $fillable = ["id", "name", "count", "price", "hospital"];
}




