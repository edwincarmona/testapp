<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DocumentRow
 * @package App\Models
 * @version December 7, 2018, 12:58 pm CST
 *
 * @property \App\Models\User user
 * @property \App\Models\Document document
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection documents
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property decimal amount
 * @property integer product_id
 * @property integer document_id
 * @property integer created_by_id
 * @property integer updated_by_id
 */
class DocumentRow extends Model
{
    public $table = 'document_rows';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_row';

    public $fillable = [
        'amount',
        'product_id',
        'document_id',
        'created_by_id',
        'updated_by_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_row' => 'integer',
        'product_id' => 'integer',
        'document_id' => 'integer',
        'created_by_id' => 'integer',
        'updated_by_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function document()
    {
        return $this->belongsTo(\App\Models\Document::class, 'document_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userUpd()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by_id');
    }
}
