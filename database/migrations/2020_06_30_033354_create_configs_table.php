<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('configs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name',100)->unique();
			$table->string('slug',100)->unique();
			$table->text('value')->nullable();
			$table->tinyInteger('type')->default(1)->comment('1 là hình ảnh, 2 là ads, 3 là contact, 4 là about us');
			$table->tinyInteger('status')->default(1)->comment('1 là Hiện, 0 là Ẩn');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('configs');
	}
}
