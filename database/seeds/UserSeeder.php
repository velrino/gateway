<?php

use App\Models\Users;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::truncate();
        Users::create([
                    'name' => 'Denis Doe',
                    'email' => 'hi@velrino.com',
                    'fake_id' => '123'
                ]);
        Users::create([
                    'name' => 'John Doe',
                    'email' => 'john@doe.com',
                    'fake_id' => '124'
                ]);
    }
}
