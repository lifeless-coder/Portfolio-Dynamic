<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\text;

class Footercontact extends Model
{
    protected $table = 'footercontacts';

    protected $fillable = [
        'text'
    ];
}
