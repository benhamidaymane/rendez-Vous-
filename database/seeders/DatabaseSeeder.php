<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\hopital;
use Illuminate\Database\Seeder;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $hopitals = hopital::all();

        foreach ($hopitals as $item){
            User::create([
                'nom' => $item->nom,
                'prenom'=>'prenom',
                'email' => $item->email,
                'password' => Hash::make('adminpassword'),
                'is_admin' => true,
                'hopital_id' => $item->id,
            ]);
        }
    }
}
