<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialVarsToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->char('first_name', 20);
            $table->char('last_name', 20);
            $table->string('email');
            $table->string('password', 100);
            $table->date('birthday');
            $table->dateTime('last_login');
            $table->timestamps(); // Adds created_at and updated_at columns
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
            $table->dropColumn(array('first_name', 'last_name', 'email', 'password', 'birthday', 'last_login'));
            $table->dropTimestamps();
		});
	}

}
