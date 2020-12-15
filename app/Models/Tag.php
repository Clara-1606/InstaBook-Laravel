<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function photos()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoTag")
                    ->withPivot("id")
                    ->withTimestamps();
    }
}
