<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model {
    protected $table = "payroll";
    protected $fillable = ["id", "name", "how_to_use", "count", "selling_price", "buy_price", "expiration_date",	"hospital"];
}




