<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = CarBrand::all();

        foreach ($brands as $brand) {
            for ($i = 0; $i < 5; $i++) {
                CarModel::create([
                    'name' => fake()->randomElement([
                        'Corolla', 'Civic', 'Accord', 'Camry', 'Mustang',
                        'X5', 'A4', 'Model S', 'Impala', 'Golf'
                    ]),
                    'car_brand_id' => $brand->id
                ]);
            }
        }
    }
}
