<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Le modèle GroupUser qui est lié à la table group_user dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class GroupUser extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; //Comme c'est une table Pivot, il faut lui indiquer que la clé primaire est incrémentée


    /**
     * Renvoi l'utilisateur lié à un groupe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Renvoi le groupe lié à l'utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['user_id',"group_id"];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_user';
}
