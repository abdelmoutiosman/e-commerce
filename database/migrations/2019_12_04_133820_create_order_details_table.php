<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('product_name');
			$table->float('product_price');
			$table->integer('product_sales_quantity');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('order_details');
	}
}