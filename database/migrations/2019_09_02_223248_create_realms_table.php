<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealmsTable extends Migration {

	public function up()
	{
		Schema::create('realms', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('slug', 191);
			$table->text('description')->nullable();
			$table->string('domain', 191);
			$table->string('authentication_method', 191)->default('native');
		});
	}

	public function down()
	{
		Schema::drop('realms');
	}
}