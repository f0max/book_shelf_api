<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(25)
            ->hasBooks(3)
            ->create();

        Customer::factory()
            ->count(10)
            ->hasBooks(0)
            ->create();
    }
}
