<?php

namespace App\Repositories;

use App\Models\DocumentRow;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DocumentRowRepository
 * @package App\Repositories
 * @version December 7, 2018, 12:58 pm CST
 *
 * @method DocumentRow findWithoutFail($id, $columns = ['*'])
 * @method DocumentRow find($id, $columns = ['*'])
 * @method DocumentRow first($columns = ['*'])
*/
class DocumentRowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'product_id',
        'document_id',
        'created_by_id',
        'updated_by_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DocumentRow::class;
    }
}
