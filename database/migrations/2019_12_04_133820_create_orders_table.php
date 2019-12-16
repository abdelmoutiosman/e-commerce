<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('order_id');
			$table->integer('customer_id')->unsigned();
			$table->integer('shipping_id')->unsigned();
			$table->integer('payment_id')->unsigned();
			$table->string('order_total');
			$table->string('order_status', array('pending', 'accepted', 'rejected'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
