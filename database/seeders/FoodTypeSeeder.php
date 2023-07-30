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
        $food_types_en = ['Fast Food','Sea Food',"Dessert","Others"];
        foreach ($food_types_en as $food_type){
            FoodType::create(['name_en' => $food_type]);
        }
        $food_types_ar = ['أكلات سريعة','أكلات بحرية',"حلوى","آخر"];
        foreach ($food_types_ar as $food_type){
            FoodType::create(['name_ar' => $food_type]);
        }
    }
}
