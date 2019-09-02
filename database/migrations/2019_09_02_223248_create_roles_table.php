<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesTable extends Migration {

	public function up()
	{
		Schema::create('roles', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('title', 191);
			$table->string('slug', 191)->unique()->nullable();
			$table->text('description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('roles');
	}
}