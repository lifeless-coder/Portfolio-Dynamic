<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quicklink extends Model
{
    protected $table = 'quicklinks';

    protected $fillable = [
        'name',
        'url',
    ];
}
