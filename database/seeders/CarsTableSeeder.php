<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModels = CarModel::all();

        foreach ($carModels as $model) {
            for ($i = 0; $i < 5; $i++) {
                Car::create([
                    'car_model_id'        => $model->id,
                    'year_of_manufacture' => fake()->year(),
                    'mileage'             => fake()->numberBetween(0, 200000),
                    'color'               => fake()->safeColorName(),
                    'car_brand_id'        => $model->car_brand_id,
                ]);
            }
        }
    }
}
