<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mariadb';
    protected $primaryKey = 'id_product';
    protected $table = 'products';

    protected $fillable = [
                    'code',
                    'name',
                    'unit_id',
                    'is_deleted',
                    'created_by_id',
                    'updated_by_id',
                ];
}
