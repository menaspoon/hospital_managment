<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model {
    protected $table = "resources";
    protected $fillable = ["id", "name", "count", "hospital"];
}


