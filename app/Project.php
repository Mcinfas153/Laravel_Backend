<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    /**
     * function user to create the  realationchip - one to many
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * function users to create the  realationchip - many to many
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
