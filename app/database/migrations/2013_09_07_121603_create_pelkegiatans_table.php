<?php

use Illuminate\Database\Migrations\Migration;

class CreatePelkegiatansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('pelkegiatans', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('kegiatan_id');			 	 		 			 
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
		Schema::drop('pelkegiatans');
	}

}