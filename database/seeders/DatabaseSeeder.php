<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Deo Subarno',
            'username' => 'deosubarno',
            'email' => 'aprodeosubarno@gmail.com',
            'password' => Hash::make('deosbrn981')
        ]);

        Todo::factory(10)->create();
    }
}
