<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'ticket_id',
        'content',
        'status',
        'filename'
    ];
}
