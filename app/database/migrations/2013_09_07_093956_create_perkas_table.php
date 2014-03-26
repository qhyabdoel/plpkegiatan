<?php

use Illuminate\Database\Migrations\Migration;

class CreatePerkasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('perkas', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('user_id');			 	 		 
			 $table->string('jenis');
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
		Schema::drop('perkas');
	}

}