<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Value::create([
            'owner_percentage' => 0.00,
            'kilo_price'       => 0.00,
            'vat'              => 0.00,
        ]);
    }
}
