<?php

use Illuminate\Database\Migrations\Migration;

class CreateNotifsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('notifs', function($table)
		 {
			 $table->increments('id');
			 $table->unsignedInteger('dokumen_id');			 
			 $table->unsignedInteger('user_id');			 
			 $table->string('waktu');
			 $table->text('isi');	
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
		Schema::drop('notifs');
	}

}