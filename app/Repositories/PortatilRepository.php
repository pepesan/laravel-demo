<?php

namespace App\Repositories;

use App\Models\Portatil;
use App\Repositories\BaseRepository;

/**
 * Class PortatilRepository
 * @package App\Repositories
 * @version August 5, 2020, 3:45 pm UTC
*/

class PortatilRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'marca',
        'modelo',
        'descripcion'
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
        return Portatil::class;
    }
}
