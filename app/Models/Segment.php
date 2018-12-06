<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Segment
 * @package App\Models
 * @version November 28, 2018, 10:42 am CST
 *
 * @property \Illuminate\Database\Eloquent\Collection products
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string code
 * @property string name
 * @property boolean is_deleted
 */
class Segment extends Model
{
    public $table = 'segments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $primaryKey = 'id_segment';

    public $fillable = [
        'code',
        'name',
        'is_deleted'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_segment' => 'integer',
        'code' => 'string',
        'name' => 'string',
        'is_deleted' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
