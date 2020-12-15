<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Le modèle Group qui est lié à la table groups dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class Group extends Model
{
    use HasFactory;

    /**
     * Renvoie tous les photos qui sont asssociés au groupe
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
{
    return $this->hasMany('App\Models\Photo');
}

/**
     * Renvoie tous les utilisateurs qui sont asssociés au groupe
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
public function users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->using("App\Models\GroupUser")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['name',"description"];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';
}
