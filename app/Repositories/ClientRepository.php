<?php

namespace App\Repositories;

use App\Models\Client;
use InfyOm\Generator\Common\BaseRepository;
use \Sofa\ModelLocking\Locking;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version November 28, 2018, 10:45 am CST
 *
 * @method Client findWithoutFail($id, $columns = ['*'])
 * @method Client find($id, $columns = ['*'])
 * @method Client first($columns = ['*'])
*/
class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_code',
        'client_name',
        'credit_days',
        'credit_limit',
        'is_deleted',
        'segment_id',
        'created_by_id',
        'updated_by_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
