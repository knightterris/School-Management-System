<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Principle',
            'email' => 'superadmin@gmail.com',
            'phone' => '09777187890',
            'address' => 'USA',
            'role' => 'superAdmin',
            'nrc'=>'12/THAGAKA(S)196233',
            'status'=>'1',
            'payment'=>'1',
            'password' => Hash::make('superadmin'),
        ]);
    }
}
