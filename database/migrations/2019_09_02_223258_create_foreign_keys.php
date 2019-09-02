<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('role_user', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('role_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->foreign('permission_id')->references('id')->on('permissions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('login_attempts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('menu_menu_item', function(Blueprint $table) {
			$table->foreign('menu_id')->references('id')->on('menus')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('menu_menu_item', function(Blueprint $table) {
			$table->foreign('menu_item_id')->references('id')->on('menu_items')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_attributes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('realmables', function(Blueprint $table) {
			$table->foreign('realm_id')->references('id')->on('realms')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('role_user', function(Blueprint $table) {
			$table->dropForeign('role_user_role_id_foreign');
		});
		Schema::table('role_user', function(Blueprint $table) {
			$table->dropForeign('role_user_user_id_foreign');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->dropForeign('permission_role_permission_id_foreign');
		});
		Schema::table('permission_role', function(Blueprint $table) {
			$table->dropForeign('permission_role_role_id_foreign');
		});
		Schema::table('login_attempts', function(Blueprint $table) {
			$table->dropForeign('login_attempts_user_id_foreign');
		});
		Schema::table('menu_menu_item', function(Blueprint $table) {
			$table->dropForeign('menu_menu_item_menu_id_foreign');
		});
		Schema::table('menu_menu_item', function(Blueprint $table) {
			$table->dropForeign('menu_menu_item_menu_item_id_foreign');
		});
		Schema::table('user_attributes', function(Blueprint $table) {
			$table->dropForeign('user_attributes_user_id_foreign');
		});
		Schema::table('realmables', function(Blueprint $table) {
			$table->dropForeign('realmables_realm_id_foreign');
		});
	}
}