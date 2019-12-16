<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingsTable extends Migration {

	public function up()
	{
		Schema::create('shippings', function(Blueprint $table) {
			$table->increments('shipping_id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('address');
			$table->string('mobile');
			$table->string('email');
			$table->string('city');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('shippings');
	}
}
