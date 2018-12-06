<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Sofa\ModelLocking\Locking;

/**
 * Class Client
 * @package App\Models
 * @version November 28, 2018, 10:45 am CST
 *
 * @property \App\Models\User user
 * @property \App\Models\Segment segment
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string client_code
 * @property string client_name
 * @property integer credit_days
 * @property decimal credit_limit
 * @property boolean is_deleted
 * @property integer segment_id
 * @property integer created_by_id
 * @property integer updated_by_id
 */
class Client extends Model
{
    use Locking;
    
    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_client';

    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_client' => 'integer',
        'client_code' => 'string',
        'client_name' => 'string',
        'credit_days' => 'integer',
        'is_deleted' => 'boolean',
        'segment_id' => 'integer',
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
        return $this->belongsTo(\App\User::class, 'created_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function segment()
    {
        return $this->belongsTo(\App\Models\Segment::class, 'segment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userUpd()
    {
        return $this->belongsTo(\App\User::class, 'updated_by_id');
    }
}
