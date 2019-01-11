<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    /**
     * function users to create the many to many realationchip
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
