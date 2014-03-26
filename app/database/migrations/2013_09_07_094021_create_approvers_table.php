<?php

use Illuminate\Database\Migrations\Migration;

class CreateApproversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('approvers', function($table)
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
		Schema::drop('approvers');
	}

}