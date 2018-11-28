<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mariadb")->create('segments', function (blueprint $table) {	
            $table->increments('id_segment');
            $table->char('code', 10)->unique();
            $table->char('name', 100);
            $table->boolean('is_deleted');
            $table->timestamps();
        });	
            
        DB::connection("mariadb")->table('segments')->insert([	
            ['id_segment' => '1','code' => 'NA','name' => 'NA','is_deleted' => '1'],
            ['id_segment' => '2','code' => 'RET','name' => 'RETAIL','is_deleted' => '0'],
            ['id_segment' => '3','code' => 'MAY','name' => 'MAYOREO','is_deleted' => '0'],
            ['id_segment' => '4','code' => 'EXP','name' => 'EXPORTACIÓN','is_deleted' => '0'],
        ]);	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('segments');
    }
}
