<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hacer ventana de categorias
       $categories = [
        [
            'name' => 'Academies',
            'slug' => Str::slug('Academies'),
           
        ],
        [
            'name' => 'Administration & Laws',
            'slug' => Str::slug('Administration & Laws'),
            
        ],
        [
            'name' => 'Cars Area',
            'slug' => Str::slug('Cars Area'),
           
        ],
        [
            'name' => 'Chef',
            'slug' => Str::slug('Chef'),
            
        ],
        [
            'name' => 'Construction & Remodeling',
            'slug' => Str::slug('Construction & Remodeling'),
           
        ],
        [
            'name' => 'Computers & Electronic',
            'slug' => Str::slug('Computers & Electronic'),
            
        ],
        [
            'name' => 'Events & Party',
            'slug' => Str::slug('Events & Party'),
           
        ],
        [
            'name' => 'Fashion & Aesthetics',
            'slug' => Str::slug('Fashion & Aesthetics'),
           
        ],
        [
            'name' => 'Insurance Agents',
            'slug' => Str::slug('Insurance Agents'),
           
        ],
        [
            'name' => 'Marketing & Developers',
            'slug' => Str::slug('Marketing & Developers'),
           
        ],
        [
            'name' => 'Real State Agent',
            'slug' => Str::slug('Real State Agent'),
           
        ],
        [
            'name' => 'Travel & Tourism',
            'slug' => Str::slug('Marketing & Developers'),
           
        ],    

        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();           
        }
    }
}
