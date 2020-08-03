<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['subject', 'message'];
    protected $guarded = ['id'];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
