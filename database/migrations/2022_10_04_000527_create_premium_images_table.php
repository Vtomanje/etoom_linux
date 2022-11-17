<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('route')->nullable();
            $table->string('url');
            $table->timestamps();

            /* foreign */
            $table->foreign('user_id')
            ->references('id')
            ->on('users');

             /* foreign */
             $table->foreign('product_id')
             ->references('id')
             ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_images');
    }
};
