<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Juan Camilo Soto Pineda',
            'password' => 'Marianita.07',
            'email' => 'juan.soto@flamingo.com.co',
            'valid_id' => 1
        ]);
        $user->roles()->attach(1);

        $user = User::create([
            'name' => 'Juan Camilo Soto Pineda',
            'password' => 'Marianita.07',
            'email' => 'juancamilo.soto@outlook.com',
            'valid_id' => 1
        ]);
        $user->roles()->attach(1);
    }
}
