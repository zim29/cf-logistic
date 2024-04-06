<?php

namespace Database\Seeders;

use App\Models\PayMethod;
use App\Models\PersonType;
use App\Models\TaxClassification;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

    }
}
