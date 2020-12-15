<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Le modèle Tag qui est lié à la table tags dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class Tag extends Model
{
    use HasFactory;

    /**
     * Renvoi la photo lié au  tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    /**
     * Renvoie tous les photos qui sont asssociés au tag
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['name'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';
}
