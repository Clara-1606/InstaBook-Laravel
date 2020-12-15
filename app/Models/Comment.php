<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Le modèle Comment qui est lié à la table comments dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class Comment extends Model
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
        static::creating(function ($comment) {
            return $comment->photo->group->users->find($comment->user_id)!==null;
        });
    }

    /**
     * Renvoi la photo qui a correspond au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    /**
     * Renvoi l'utilisateur qui a écrit commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Renvoi le commentaire qui a répond au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function replyTo()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_id','id');
    }

    /**
     * Renvoi les commentaires qui a ont répondu au commentaire
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function replies(){
        return $this->hasMany('App\Models\Comment');
    }

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['text','user_id','comment_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

}
