<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('businesses', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password', 100);
            $table->text('about');
            $table->string('address1', 100);
            $table->string('address2', 50);
            $table->string('city', 100);
            $table->char('state', 2);
            $table->char('zipcode', 5);
            $table->float('latitude');
            $table->float('longitude');
            $table->dateTime('last_login');
            $table->rememberToken();
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
        Schema::drop('businesses');
	}

}
