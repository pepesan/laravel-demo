<?php

namespace App\Repositories;

use App\Models\Coche;
use App\Repositories\BaseRepository;

/**
 * Class CocheRepository
 * @package App\Repositories
 * @version August 6, 2020, 3:37 pm UTC
*/

class CocheRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'marca'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Coche::class;
    }
}
