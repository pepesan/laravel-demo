<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Coche
 * @package App\Models
 * @version August 6, 2020, 3:37 pm UTC
 *
 * @property string $marca
 */
class Coche extends Model
{

    public $table = 'coches';
    



    public $fillable = [
        'marca'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'marca' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'marca' => 'required'
    ];

    
}
