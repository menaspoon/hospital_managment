<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsReceive extends Model {
    protected $table = "product_receive";
    protected $fillable = ["product", "count", "sender", "recipient", "date_filter", "created"];
}