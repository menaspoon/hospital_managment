<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ChatAd extends Model {
    use HasFactory;

    protected $table = 'chat_ad';

    protected $fillable = [
        "user",	"responsible", "ad",
    ];


}
