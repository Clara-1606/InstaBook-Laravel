<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Le modèle User qui est lié à la table users dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/**
     * Renvoi la liste des commentaires rédigés par l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Renvoi la liste des photos envoyé par l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }

 /**
     * Renvoie tous les groupes qui sont asssociés a l'utilisateur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */   
    public function groups()
    {
        return $this->belongsToMany('App\Models\Group')
                    ->using("App\Models\GroupUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * Renvoie tous les photos où apparait l'utilisateur
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */   
    public function photosAppearance()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

}
