<?php

namespace Database\Seeders;

use App\Models\PayMethod;
use App\Models\PersonType;
use App\Models\TaxClassification;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            PersonTypeSeeder::class,
            RoleSeeder::class,
            TaxClassificationSeeder::class,
            PayMethodSeeder::class,
        ]); 
        
        User::factory(10)->create();
        Client::factory(50)->create();


        $users = [
            ['name' => 'Admin', 'email'=> 'admin@example.com', 'password'=> Hash::make('password'), 'role_id' => 1],
            ['name' => 'finanzas', 'email'=> 'finanzas@example.com', 'password'=> Hash::make('password'), 'role_id' => 2],
            ['name' => 'ventas', 'email'=> 'ventas@example.com', 'password'=> Hash::make('password'), 'role_id' => 3],
            ['name' => 'Operaciones', 'email'=> 'admin@example.com', 'password'=> Hash::make('password'), 'role_id' => 4],
            ['name' => 'Delivery', 'email'=> 'admin@example.com', 'password'=> Hash::make('password'), 'role_id' => 5],
            ['name' => 'Cliente', 'email'=> 'admin@example.com', 'password'=> Hash::make('password'), 'role_id' => 6, 'client_id' => 1],
        ];

    }
}
