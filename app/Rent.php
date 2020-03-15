<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cd_id','borrow_date','return_date'
    ];


}