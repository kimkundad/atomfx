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
            $table->id();
            $table->string('order_id')->default('0');
            $table->integer('user_id')->default('0');
            $table->integer('package_id')->default('0');
            $table->integer('broker_id')->default('0');
            $table->integer('total')->default('0');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->text('detail')->nullable();
            $table->text('email_ac')->nullable();
            $table->text('account_ac')->nullable();
            $table->integer('status')->default('0');
            $table->integer('status_2')->default('0');
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
