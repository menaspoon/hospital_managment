<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
    protected $table = "products";
    protected $fillable = ["id", "name", "price", "count", "hospital"];
}