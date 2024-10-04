<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Toyota', 'Nissan', 'Honda', 'Mazda', 'Ford',
            'BMW', 'Mercedes-Benz', 'Audi', 'Chevrolet', 'Volkswagen'
        ];
        foreach ($brands as $brand) {
            CarBrand::create([
                'name' => $brand
            ]);
        }
    }
}
