<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
        'sender',
        'email',
        'message',
    ];
}
