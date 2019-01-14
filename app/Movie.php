<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * function users to create the  realationchip
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
