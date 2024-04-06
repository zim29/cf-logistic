<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PayMethod;

class PayMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            ['name' => 'Efectivo'],
            ['name' => 'Cheque'],
            ['name' => 'Transferencia '],
        ];

        foreach($values as $value)
        {
            PayMethod::create($value);
        }
    }
}
