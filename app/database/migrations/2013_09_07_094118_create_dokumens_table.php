<?php

use Illuminate\Database\Migrations\Migration;

class CreateDokumensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('dokumens', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('pelkegiatan_id');			 		 		 			 
			 $table->string('lokfile');			 
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
		Schema::drop('dokumens');
	}

}