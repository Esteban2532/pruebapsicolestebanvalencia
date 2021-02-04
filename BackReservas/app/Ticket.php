<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'duration', 'place'
    ];
    protected $hidden = [
         'created_at', 'updated_at'
    ];

}
