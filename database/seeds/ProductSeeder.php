<?php

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::truncate();
        Products::create([
                    "description"=>"Viagem Ceará",
                    "quantity" => "1",
                    "price_cents" => "1000",
                    'fake_id' => '1'
                ]);
        Products::create([
                    "description"=>"Viagem Dubai",
                    "quantity" => "1",
                    "price_cents" => "1500",
                    'fake_id' => '2'
                ]);
    }
}
