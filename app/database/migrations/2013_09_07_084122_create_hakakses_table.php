<?php

use Illuminate\Database\Migrations\Migration;

class CreateHakAksesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('hakakses', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('user_id');			 
			 $table->string('peran');
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
		Schema::drop('hakakses');
	}

}