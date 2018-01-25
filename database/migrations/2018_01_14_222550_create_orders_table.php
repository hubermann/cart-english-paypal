<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');

            $table->string('area_code');
            $table->string('telephone');

            $table->string('street_name');
            $table->string('street_number');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');

            $table->text('order_description');
            $table->decimal('amount', 10, 2);
            $table->tinyInteger('shipping')->default('0'); //0 = no
            $table->tinyInteger('payment_status')->default('0'); //0 = pendiente - 1 pagado
            $table->tinyInteger('delivered')->default('0'); //0 = pendiente - 1 en camino - 2 entregado
            $table->string('feedback_mp')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
