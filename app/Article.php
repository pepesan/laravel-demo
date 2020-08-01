<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// https://www.toptal.com/laravel/restful-laravel-api-tutorial
class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'body'];
    protected $guarded = ['id'];
}
