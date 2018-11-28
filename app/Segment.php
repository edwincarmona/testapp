<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $connection = 'mariadb';
    protected $primaryKey = 'id_segment';
    protected $table = 'segments';

    protected $fillable = [
                    'code',
                    'name',
                    'is_deleted',
                ];
}
