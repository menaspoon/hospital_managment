<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsPurchases extends Model {

    protected $table = "tools_purchases";
    protected $fillable = [ 
        "id", "invoice_type", "operation_type", "supplier", "discount",	"paid_up",	"total_due", "created",	"hospital",	"user_id"	
    ];

}




