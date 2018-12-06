<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Sofa\ModelLocking\Locking;

/**
 * Class Product
 * @package App\Models
 * @version November 28, 2018, 10:43 am CST
 *
 * @property \App\Models\User user
 * @property \App\Models\Unit unit
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string code
 * @property string name
 * @property integer unit_id
 * @property integer created_by_id
 * @property integer updated_by_id
 * @property boolean is_deleted
 */
class Product extends Model
{
    use Locking;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_product';

    public $fillable = [
        'code',
        'name',
        'unit_id',
        'created_by_id',
        'updated_by_id',
        'is_deleted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_product' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'unit_id' => 'integer',
        'created_by_id' => 'integer',
        'updated_by_id' => 'integer',
        'is_deleted' => 'boolean'
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
        return $this->belongsTo(\App\User::class, 'created_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userUpd()
    {
        return $this->belongsTo(\App\User::class, 'updated_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function unit()
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id');
    }
}
