<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('key', 191)->unique();
			$table->string('display_name', 191);
			$table->text('value')->nullable();
			$table->text('details')->nullable();
			$table->string('type', 191);
			$table->integer('order')->default('1');
			$table->text('parameters')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}