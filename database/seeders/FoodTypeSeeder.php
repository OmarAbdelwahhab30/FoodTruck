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
        $food_types_en = [
            'Fast Food' => 'أكلات سريعة'
            ,'Sea Food' => 'أكلات بحرية'
            ,"Dessert" => "حلوى"
            ,"Others" => "آخر"
        ];
        foreach ($food_types_en as $key => $value){
            FoodType::create([
                'name_en' => $key,
                'name_ar' => $value,
            ]);
        }
    }
}
