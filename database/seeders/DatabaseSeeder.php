<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Operation;
use App\Models\Operation_type;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Product::factory(20)->create();
        Operation_type::create([
            'type' => 'in',
            'description' => ''
        ]);
        Operation_type::create([
            'type' => 'out',
            'description' => ''
        ]);
        Order::factory(3)->create();
        Operation::factory(100)->create();
    }
}
