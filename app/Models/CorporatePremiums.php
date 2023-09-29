<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporatePremiums extends Model {

    protected $table = "corporate_premiums";

    protected $fillable = [
        "id", "company", "hospital", "money", "created"	
    ];

}


