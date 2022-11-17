<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\County;
use App\Models\Product;

use App\Models\Department;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->sentence(2);
      
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category; 

        /* $this->faker->randomElement([1,2]) */
        $users = User::all();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'business_type' => 'info del business type',
            'phone_number' => '000000',
            'mail' => 'mail empresarial',
            'filling_number_id' => $this->faker->randomElement([1,2]),
            'subcategory_id' => $subcategory->id,            
            'user_id' => $users->random()->id,
            // ! campos agregados  que generan un id aleatorio de departamento ciudad y condado para cada uno de los productos
            'department_id' => Department::all()->random(),
            'city_id' => City::all()->random(),
            'zip_code' => $this->faker->randomElement([00000,11111,22222,33333]),
            'address' => $this->faker->text(),
            'status' => 2
        ];
    }
}
