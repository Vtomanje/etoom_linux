<?php

namespace Database\Seeders;

use Database\Factories\ImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Roles y Permisos;

        // Usuarios Base
        

        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');

        Storage::deleteDirectory('advertising');
        Storage::deleteDirectory('premium');
        
        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products');

        Storage::makeDirectory('advertising');
        Storage::makeDirectory('premium');

        $this->call(RoleSeeder::class);

        $this->call(UserSedeer::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);

        // ! primero se deben crear los departamentos, ciudades, y condados para que se le puedan asignar a la tabla products
        $this->call(DepartmentSeeder::class);
        $this->call(FillingNumberSeeder::class);
        $this->call(ProductSeeder::class);


       /*  User::factory(5)->create()->each(function ($user) {
            $user->assignRole('client');    
        });    */     
    }
}
