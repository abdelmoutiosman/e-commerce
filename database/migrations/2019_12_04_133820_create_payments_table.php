<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('payment_id');
			$table->string('payment_method');
			$table->string('payment_status');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}
