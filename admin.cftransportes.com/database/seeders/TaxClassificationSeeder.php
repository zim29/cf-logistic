<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\TaxClassification;

class TaxClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            ['name' => 'Grande'],
            ['name' => 'Mediana'],
            ['name' => 'Pequeña'],
        ];

        foreach($values as $value)
        {
            TaxClassification::create($value);
        }
    }
}
