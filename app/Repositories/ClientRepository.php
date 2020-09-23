<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\BaseRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version August 30, 2020, 1:58 pm UTC
*/

class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'matricule'
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


    public function getOpById($id,$columns = ['*']){
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
