<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Document
 * @package App\Models
 * @version December 7, 2018, 12:57 pm CST
 *
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection DocumentRow
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property date dt_date
 * @property decimal amount
 * @property integer created_by_id
 * @property integer updated_by_id
 */
class Document extends Model
{
    public $table = 'documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_document';

    public $fillable = [
        'dt_date',
        'amount',
        'created_by_id',
        'updated_by_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_document' => 'integer',
        'dt_date' => 'date',
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
    public function userUpd()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function documentRows()
    {
        return $this->hasMany(\App\Models\DocumentRow::class);
    }
}
