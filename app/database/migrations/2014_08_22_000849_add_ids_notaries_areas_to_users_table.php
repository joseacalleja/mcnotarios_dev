<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdsNotariesAreasToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table)
		{
		    $table->integer('workable_id')->unsigned();
		    $table->string('workable_type');
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
		Schema::table('users', function($table)
                {
                    $table->dropColumn('workable_id');
                    $table->dropColumn('workable_type');
                });	    
	}

}
