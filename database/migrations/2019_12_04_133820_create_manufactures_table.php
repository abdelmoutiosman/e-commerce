<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManufacturesTable extends Migration {

	public function up()
	{
		Schema::create('manufactures', function(Blueprint $table) {
			$table->increments('id');
			$table->string('manufacture_name');
			$table->text('manufacture_description');
			$table->tinyInteger('publication_status')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('manufactures');
	}
}
