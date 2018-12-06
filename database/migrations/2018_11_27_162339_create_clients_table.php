<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mariadb")->create('clients', function (blueprint $table) {	
            $table->increments('id_client');
            $table->char('client_code', 25);
            $table->char('client_name', 190);
            $table->integer('credit_days');
            $table->decimal('credit_limit', 17,2);
            $table->boolean('is_deleted');
            $table->integer('segment_id')->unsigned();
            $table->integer('created_by_id')->unsigned();
            $table->integer('updated_by_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('segment_id')->references('id_segment')->on('segments')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mariadb')->drop('clients');
    }
}
