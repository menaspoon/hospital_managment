<?php

namespace App\Models\Pharmacy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetalesBuyingMedicines extends Model {

    protected $table = "invoice_detales_buying_medicines";
    protected $fillable = [ 
        "id", "product", "count", "price", "invoice_id", "hospital"	
    ];

}




