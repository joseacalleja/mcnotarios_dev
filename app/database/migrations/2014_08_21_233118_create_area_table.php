<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('areas', function($table)
	        {
	         // unique
		     $table->increments('id');
	             $table->string('number');
	             $table->string('description');
	             $table->integer('responsible')->unsigned()->unique();
	             $table->string('cell_phone');
	             $table->string('office_phone');
	             $table->string('email');
	             $table->string('ubication');
		     $table->timestamps();
		     $table->foreign('responsible')->references('id')->on('users');
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
		Schema::drop('areas');
	}

}
