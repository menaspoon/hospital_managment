<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Notifications  extends Model {
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = [
        "sender", "user",	"message",  "user_view", "hospital", "company", "created"	
    ];


}
