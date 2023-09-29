<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceBuyingMedicines extends Model {

    protected $table = "invoice_buying_medicines";
    protected $fillable = [ 
        "id", "invoice_type", "operation_type", "supplier", "discount",	"paid_up",	"total_due", "created",	"hospital",	"user_id"	
    ];

}




