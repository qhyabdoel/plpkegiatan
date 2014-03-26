<?php

use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('kegiatans', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('pelaksana');	 		 			 
			 $table->string('title')->unique();
			 $table->text('detail');
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
		Schema::drop('kegiatans');
	}

}