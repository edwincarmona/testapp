<?php

namespace App\Repositories;

use App\Models\Unit;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UnitRepository
 * @package App\Repositories
 * @version November 28, 2018, 10:40 am CST
 *
 * @method Unit findWithoutFail($id, $columns = ['*'])
 * @method Unit find($id, $columns = ['*'])
 * @method Unit first($columns = ['*'])
*/
class UnitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'is_deleted'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Unit::class;
    }
}
