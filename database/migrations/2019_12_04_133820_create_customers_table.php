<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('customer_id');
			$table->string('customer_name');
			$table->string('email_address');
			$table->string('password');
			$table->string('telephone');
			$table->tinyInteger('status')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}
