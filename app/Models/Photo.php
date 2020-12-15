<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * Renvoie l'utilisateur propriétaire de la photo (celui qui l'a créé)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    } 

    /**
     * Renvoie tous les utilisateurs qui sont asssociés a la photo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->using("App\Models\PhotoUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

}
 