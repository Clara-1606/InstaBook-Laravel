<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            return $comment->user->find($comment->user_id)!==null;
        });
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replyTo()
    {
        return $this->belongsTo('App\Models\Comment', 'comment_id','id');
    }

    public function replies(){
        return $this->hasMany('App\Models\Comment');
    }



}
