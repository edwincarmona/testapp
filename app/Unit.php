<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $connection = 'mariadb';
    protected $primaryKey = 'id_unit';
    protected $table = 'units';

    protected $fillable = [
                    'code',
                    'name',
                    'is_deleted',
                ];
}
