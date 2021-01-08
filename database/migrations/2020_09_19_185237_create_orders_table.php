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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('method_id')->nullable();
            $table->foreign('method_id')->references('id')->on('methods')->onDelete('cascade');


            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            $table->string('transaction_id')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('email');

            $table->string('phone_number');
            $table->string('note')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->boolean('is_on_processing')->default(0);
            $table->boolean('is_completed')->default(0);

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
