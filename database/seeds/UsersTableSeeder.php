<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Victor Valencia',
            'email' => 'v@admin.com',
            'password' => bcrypt('secret'),
            'dni' => '29717324',
            'address' => 'Av. Paisajista 136',
            'phone' => '959824954',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Paciente Test',
            'email' => 'p@admin.com',
            'password' => bcrypt('secret'),
            'role' => 'patient'
        ]);
        User::create([
            'name' => 'Médico Test',
            'email' => 'd@admin.com',
            'password' => bcrypt('secret'),
            'role' => 'doctor'
        ]);
        factory(User::class, 50)->state('patient')->create();
    }
}
