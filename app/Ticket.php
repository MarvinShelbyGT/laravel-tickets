<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'subject',
        'content',
        'priority',
        'category',
        'place',
        'status'
    ];
}
