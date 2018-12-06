<?php

namespace App\Repositories;

use App\Models\Segment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SegmentRepository
 * @package App\Repositories
 * @version November 28, 2018, 10:42 am CST
 *
 * @method Segment findWithoutFail($id, $columns = ['*'])
 * @method Segment find($id, $columns = ['*'])
 * @method Segment first($columns = ['*'])
*/
class SegmentRepository extends BaseRepository
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
        return Segment::class;
    }
}
