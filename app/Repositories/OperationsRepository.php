<?php

namespace App\Repositories;

use App\Models\Operations;
use App\Repositories\BaseRepository;

/**
 * Class OperationsRepository
 * @package App\Repositories
 * @version August 30, 2020, 2:09 pm UTC
*/

class OperationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'montant',
        'type',
        'date',
        'compte_id'
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
        return Operations::class;
    }
}
