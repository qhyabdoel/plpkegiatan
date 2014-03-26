<?php

use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('admins', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('user_id');			 
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
		Schema::drop('admins');
	}

}