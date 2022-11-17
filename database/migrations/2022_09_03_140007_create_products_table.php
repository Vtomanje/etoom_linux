<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('slug');
           
            $table->text('description',1000);
            $table->string('business_type'); 
            $table->string('zip_code'); 
            $table->string('address')->nullable(); 

            $table->string('phone_number'); 
            $table->string('mail'); 

            /* redes */
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();

            /* status */

            $table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);

            
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            // ! campo agregado
            
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            
            // ! campo agregado
            
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            
            // ! campo agregado
            
        /*     $table->unsignedBigInteger('county_id')->nullable();
            $table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade'); */
            
            $table->unsignedBigInteger('filling_number_id')->nullable();
            $table->foreign('filling_number_id')->references('id')->on('filling_numbers')->onDelete('cascade');    

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
};
