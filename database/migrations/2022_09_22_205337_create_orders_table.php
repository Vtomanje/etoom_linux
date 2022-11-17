<?php

use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
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
            
            $table->string('name');
            $table->string('slug');
           
            $table->text('description');
            $table->string('business_type'); 

            $table->string('phone_number'); 
            $table->string('mail'); 

            
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // ! campo agregado
            
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            
            // ! campo agregado
            
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            // ! campo agregado
            
            $table->unsignedBigInteger('county_id')->nullable();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
            
            $table->unsignedBigInteger('filling_id')->nullable();
            $table->foreign('filling_id')->references('id')->on('filling_numbers')->onDelete('cascade');

            $table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);

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
};
