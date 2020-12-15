<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Le modèle PhotoTag qui est lié à la table photo_tag dans la base de données
 * 
 * @author Clara Vesval B2B Info <clara.vesval@ynov.com>
 * 
 */

class PhotoTag extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; //Comme c'est une table Pivot, il faut lui indiquer que la clé primaire est incrémentée

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
     * Renvoi le tag lié à la photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable=['tag_id','photo_id'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photo_tag';
}
