<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function photos()
{
    return $this->hasMany('App\Models\Photo');
}

public function tasks()
{
    return $this->hasMany('App\Models\Task');
}

public function users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->using("App\Models\GroupUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }
}
