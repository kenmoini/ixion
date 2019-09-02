<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAttributesTable extends Migration {

	public function up()
	{
		Schema::create('user_attributes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('user_id')->unsigned();
			$table->string('key', 191);
			$table->string('display_name', 191);
			$table->text('value')->nullable();
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('user_attributes');
	}
}