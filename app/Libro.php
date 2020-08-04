<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $fillable = ['titulo'];
    protected $guarded = ['id'];
    public function autors()
    {
        return $this->belongsToMany('App\Autor', "autors_libros")->withPivot('role');
    }
}
