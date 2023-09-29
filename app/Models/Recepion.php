<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepion extends Model {


    protected $table = "recepion";

    protected $fillable = [
        "username",	"phone", "insurance_number", "category", "medical_examination",	"doctor", "created"	
    ];

}


