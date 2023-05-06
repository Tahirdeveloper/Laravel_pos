<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            // $table->bigIncrements('invoice_id');
            $table->string('invoice_no')->primary();
            $table->bigInteger('discount');
            $table->bigInteger('dues');
            $table->bigInteger('change');
            $table->bigInteger('subTotal');
            $table->boolean('status');
            $table->date('date');            
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps(); 
            $table->foreign('order_id')->references('order_id')->on('order_inv')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
