<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTableFormat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_data', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->char('first_name', 20);
            $table->char('last_name', 20);
            $table->char('gender', 1);
            $table->date('birthday');
            $table->timestamps();
        });

        Schema::table('users', function($table)
        {
            $table->dropColumn(array('first_name', 'last_name', 'gender', 'birthday'));
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
	}

}
