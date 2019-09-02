<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAttemptsTable extends Migration {

	public function up()
	{
		Schema::create('login_attempts', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->string('login_ip', 15)->nullable()->default('40');
			$table->timestamp('login_time')->nullable();
			$table->string('login_result', 191);
		});
	}

	public function down()
	{
		Schema::drop('login_attempts');
	}
}