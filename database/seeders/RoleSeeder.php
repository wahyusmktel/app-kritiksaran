<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat role
        $roles = ['super_admin', 'operator', 'kepala_sekolah', 'waka', 'guru'];
        
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Buat akun admin default
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin'
        ])->assignRole('super_admin');
    }
}
