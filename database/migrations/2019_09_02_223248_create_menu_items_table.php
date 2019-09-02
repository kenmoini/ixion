<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration {

	public function up()
	{
		Schema::create('menu_items', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title', 191);
			$table->text('url')->nullable();
			$table->string('target', 191)->default('_self');
			$table->string('icon_class', 191)->nullable();
			$table->text('extra_class')->nullable();
			$table->text('route')->nullable();
			$table->text('parameters')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('menu_items');
	}
}