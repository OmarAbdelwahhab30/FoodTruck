<?php

namespace Database\Seeders;

use App\Models\FoodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food_types = ['Fast Food','Sea Food',"Dessert","Others"];
        foreach ($food_types as $food_type){
            FoodType::create(['name' => $food_type]);
        }
    }
}
