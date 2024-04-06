<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PersonType;

class PersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            ['name' => 'Persona Natural'],
            ['name' => 'Persona Jurídica'],
        ];

        foreach($values as $value)
        {
            PersonType::create($value);
        }
    }
}
