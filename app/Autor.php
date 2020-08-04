<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autors';
    protected $fillable = ['nombre'];
    protected $guarded = ['id'];
    public function libros()
    {
        return $this->belongsToMany('App\Libro', "autors_libros")->withPivot('role');
    }
}
