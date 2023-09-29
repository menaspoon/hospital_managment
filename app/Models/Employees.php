<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model {


    protected $table = "employees";

    protected $fillable = [
    "name", "phone" ,"email", "address" ,"sex", "nationality", "blood_type", "card_id", "relative_relation", "date_of_birth", 'picture', "insurance_number", "balance", "remaining_amount", "company", "created", "updated_at"


    ];

}




 
