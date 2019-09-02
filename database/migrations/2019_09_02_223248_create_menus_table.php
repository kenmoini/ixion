<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration {

	public function up()
	{
		Schema::create('menus', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('slug', 191)->unique();
		});
	}

	public function down()
	{
		Schema::drop('menus');
	}
}