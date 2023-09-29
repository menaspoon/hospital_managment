<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsPurchasesDetails extends Model {

    protected $table = "tools_purchases_details";
    protected $fillable = ["id", "product", "count", "price", "invoice_id", "hospital"];

}




