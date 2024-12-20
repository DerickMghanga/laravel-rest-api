<?php

namespace Database\Seeders;

use App\Models\Customer;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate different types of customers with various data
        Customer::factory()->count(25)->hasInvoices(10)->create();
        Customer::factory()->count(100)->hasInvoices(5)->create();
        Customer::factory()->count(100)->hasInvoices(3)->create();
        Customer::factory()->count(5)->create();
    }
}
