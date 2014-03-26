<?php

use Illuminate\Database\Migrations\Migration;

class CreateKalendersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('kalendars', function($table)
		 {
			 $table->increments('id');			 	 
			 $table->string('tanggal');			
			 $table->timestamps(); 
		 });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('kalendars');
	}

}