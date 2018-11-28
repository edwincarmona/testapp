<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mariadb")->create('units', function (blueprint $table) {	
            $table->increments('id_unit');
            $table->char('code', 10)->unique();
            $table->char('name', 100);
            $table->boolean('is_deleted');
            $table->timestamps();
        });	
            
        DB::connection("mariadb")->table('units')->insert([
            ['id_unit' => '1','code' => 'NA','name' => 'NA','is_deleted' => '1'],
            ['id_unit' => '2','code' => 'PZA','name' => 'PIEZA','is_deleted' => '0'],
            ['id_unit' => '3','code' => 'KG','name' => 'KILOGRAMO','is_deleted' => '0'],
            ['id_unit' => '4','code' => 'LT','name' => 'LITRO','is_deleted' => '0'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
