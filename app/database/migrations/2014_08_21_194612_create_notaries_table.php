<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Notaries table
		Schema::create('notaries', function($table)
		{
			// unique
			$table->increments('id');
			$table->string('number');
			$table->string('description');
			$table->integer('responsible')->unsigned()->unique();
			$table->string('cell_phone');
			$table->string('office_phone');
			$table->string('email');
			// unique
			$table->string('curp');
			// unique
			$table->string('rfc')->unique();
			$table->string('legal_name');
			$table->string('street');
			$table->string('int_number');
			$table->string('ext_number')->nullable();
			$table->string('colony');
			$table->string('add_ubication')->nullable();
			$table->string('city');
			$table->string('state');
			$table->string('country');
			$table->string('zip_code');
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
		Schema::drop('notaries');
	}

}
