<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('manufacture_id')->unsigned();
			$table->string('product_name');
			$table->text('short_description');
			$table->text('long_description');
			$table->float('price');
			$table->string('image');
			$table->string('size');
			$table->string('color');
			$table->tinyInteger('publication_status')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
