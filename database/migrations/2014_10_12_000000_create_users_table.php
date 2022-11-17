<?php

use App\Http\Livewire\Admin\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User as UserModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();           
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');           
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            /* active */
           /*  $table->enum('client_status',[UserModel::ACTIVE,UserModel::INACTIVE])->default(UserModel::ACTIVE); */
            $table->timestamps();

              /* premium */

           /*  $table->enum('plan',[UserModel::REGULAR,UserModel::PREMIUM])->default(UserModel::REGULAR);    */       
        });
           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
