<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('order_id');
            $table->string('order_no');
            $table->string('product_name');
            $table->decimal('price');
            $table->integer('qty');
            $table->decimal('total', 10, 2);
            $table->string('invoice_no');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
            $table->foreign('invoice_no')->references('invoice_no')->on('invoices')->onDelete('cascade');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
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
