<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRealmablesTable extends Migration {

	public function up()
	{
		Schema::create('realmables', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('realm_id')->unsigned();
			$table->bigInteger('realmable_id');
			$table->string('realmable_type', 191);
		});
	}

	public function down()
	{
		Schema::drop('realmables');
	}
}