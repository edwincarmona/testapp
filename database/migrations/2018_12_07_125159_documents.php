<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("mariadb")->create('documents', function (blueprint $table) {	
            $table->increments('id_document');
            $table->date('dt_date');
            $table->decimal('amount', 17,2);
            $table->integer('created_by_id')->unsigned();
            $table->integer('updated_by_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('created_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('users')->onDelete('cascade');
        });	

        Schema::connection("mariadb")->create('document_rows', function (blueprint $table) {	
            $table->increments('id_row');
            $table->decimal('amount', 17,2);
            $table->integer('product_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->integer('created_by_id')->unsigned();
            $table->integer('updated_by_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('document_id')->references('id_document')->on('documents')->onDelete('cascade');
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
        Schema::connection('mariadb')->drop('document_rows');
        Schema::connection('mariadb')->drop('documents');
    }
}
