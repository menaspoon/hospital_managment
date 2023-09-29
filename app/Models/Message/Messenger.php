<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Messenger extends Model {
    use HasFactory;

    protected $table = 'messenger';

    protected $fillable = [
        "sender", "user", "message", "hospital", "user_view", "view", "created"
    ];


}
