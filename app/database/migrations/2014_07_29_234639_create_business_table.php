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
        Schema::create('business_data', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->text('about');
            $table->string('address1', 100);
            $table->string('address2', 50);
            $table->string('city', 100);
            $table->char('state', 2);
            $table->char('zipcode', 5);
            $table->float('latitude');
            $table->float('longitude');
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
