<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Portatil
 * @package App\Models
 * @version August 5, 2020, 3:45 pm UTC
 *
 * @property string $marca
 * @property string $modelo
 * @property string $descripcion
 */
class Portatil extends Model
{
    use SoftDeletes;

    public $table = 'portatils';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'marca',
        'modelo',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'marca' => 'string',
        'modelo' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'marca' => 'required',
        'modelo' => 'required'
    ];

    
}
