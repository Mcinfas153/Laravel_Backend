<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'city',
        'zip_code',
        'street',
        'mobil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return mixed
     *
     * many to many
     *
     * every user can have many movies ***
     *
     */
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function project()      // has many - for update, create
    {
        return $this->hasMany(Project::class);
    }

    public function projects()      // many to many
    {
        return $this->belongsToMany(Project::class)
            ->withTimestamps();

        //return $this->belongsToMany( Project::class, 'user_project_working', 'user_id', 'project_id' );
    }
}
