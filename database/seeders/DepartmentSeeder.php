<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(8)->create()->each(function(Department $department){
            City::factory(8)->create([
                'department_id' => $department->id
            ])->each(function(City $city){
                County::factory(8)->create([
                    'city_id' => $city->id
                ]);
            });
        });
    }
}