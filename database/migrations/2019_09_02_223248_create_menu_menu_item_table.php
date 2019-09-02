<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuMenuItemTable extends Migration {

	public function up()
	{
		Schema::create('menu_menu_item', function(Blueprint $table) {
			$table->timestamps();
			$table->bigInteger('menu_id')->unsigned();
			$table->bigInteger('menu_item_id')->unsigned();
			$table->bigInteger('parent_id')->nullable();
			$table->integer('order')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('menu_menu_item');
	}
}