<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footertext extends Model
{
    protected $table = 'footertexts';

    protected $fillable = [
        'text',
    ];
}
