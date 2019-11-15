<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
     /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'make_offer', 'get_feedback'
    ];
}


