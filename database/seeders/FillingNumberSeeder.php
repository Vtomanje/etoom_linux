<?php

namespace Database\Seeders;

use App\Models\FillingNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FillingNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filling_numbers = ['Personal Number','FEI/EIN Number'];

        foreach ($filling_numbers as $filling_number) {
            FillingNumber::create([
                'number' => $filling_number
            ]);
        }
    }
}
