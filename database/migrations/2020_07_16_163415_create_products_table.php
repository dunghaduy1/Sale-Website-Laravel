<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('slug');
			$table->string('sku')->unique();
			$table->unsignedInteger('id_cate');
			// $table->unsignedInteger('id_attr');
			// $table->float('price',16,2);
   //          $table->float('discount')->nullable();
   //          $table->Integer('quantity')->nullable();
			$table->string('image');
			$table->text('description')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keyword')->nullable();
			$table->text('meta_desc')->nullable();
			$table->tinyInteger('featured')->default(1)->comment('1 là Hiện, 0 là Ẩn');
			$table->tinyInteger('status')->default(1)->comment('1 là Hiện, 0 là Ẩn');
			$table->timestamps();
			$table->foreign('id_cate')->references('id')->on('categories')->onDelete('cascade');
			// $table->foreign('id_attr')->references('id')->on('attrs');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('products');
	}
}
