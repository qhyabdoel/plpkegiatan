<?php

use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('infos', function($table)
		 {
			 $table->increments('id');			 
			 $table->string('title');			 
			 $table->string('info');
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
		Schema::drop('infos');
	}

}