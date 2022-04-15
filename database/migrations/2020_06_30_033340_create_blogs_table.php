<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('blogs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
			$table->unsignedInteger('id_cate');
			$table->unsignedInteger('id_admin');

			$table->string('image');
			$table->text('content');
			$table->string('meta_title')->nullable();
			$table->string('meta_keyword')->nullable();
			$table->text('meta_desc')->nullable();
			$table->tinyInteger('status')->default(1)->comment('1 là Hiện, 0 là Ẩn');
			$table->timestamps();
			$table->foreign('id_cate')->references('id')->on('categories');
			// $table->foreign('id_cate')->references('id')->on('categories')->onDelete('cascade');
			   $table->foreign('id_admin')->references('id')->on('admins');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('blogs');
	}
}
