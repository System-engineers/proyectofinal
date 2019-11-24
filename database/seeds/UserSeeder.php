<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{

    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@admin.com.co',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        $user = User::create($data);
        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::all()->pluck('id');
        $role->syncPermissions($permissions);
        $user->assignRole($role->name);
    }
}
