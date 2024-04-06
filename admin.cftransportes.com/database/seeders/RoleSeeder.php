<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            ['name' => 'Administrador'],
            ['name' => 'Finanzas'],
            ['name' => 'Ventas'],
            ['name' => 'Operaciones'],
            ['name' => 'Delivery'],
            ['name' => 'Cliente'],
        ];

        foreach($values as $value)
        {
            Role::create($value);
        }
    }
}
