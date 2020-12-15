<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Le modèle Photo qui est lié à la table photos dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class Photo extends Model
{
    use HasFactory;

/**
     * The "booted" method of the model.
     *
     *
     * @return void
     */
    protected static function booted()
    {
        //Si la fonction renvoie faux, la création ne se fait pas, sinon elle le fait
        static::creating(function ($photo) {
            return $photo->group->users->find($photo->user_id)!==null;
        });
    }

    /**
     * Renvoie tous les commentaires qui sont asssociés à la photo
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * Renvoie tous les tags qui sont asssociés à la photo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }

/**
     * Renvoie le group dr la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['title',"description",'file','date','resolution','width','height','user_id','group_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photos';

}
 