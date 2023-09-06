<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Terms;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutusAndTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'content' => "About us",
        ]);
        Terms::create([
            'content'   => "Terms And Conditions"
        ]);
    }
}
