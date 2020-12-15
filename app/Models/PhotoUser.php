<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Le modèle PhotoUser qui est lié à la table photo_user dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class PhotoUser extends Pivot
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
        static::creating(function ($photoUser) {
            return $photoUser->photo->group->users->find($photoUser->user_id)!==null;
        });
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; //Comme c'est une table Pivot, il faut lui indiquer que la clé primaire est incrémentée


    /**
     * Renvoi la photo lié à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    /**
     * Renvoi l'utilisateur lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['user_id','photo_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_user';
}
