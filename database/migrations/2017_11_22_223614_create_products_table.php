<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('dinamic_fields');
            $table->string('weight')->nullable();
            $table->string('sizes')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('material')->nullable();
            $table->tinyInteger('outstanding')->default('0');
            $table->string('color')->nullable();
            $table->integer('category_id');
            $table->integer('qty');
            $table->integer('subcategory_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
