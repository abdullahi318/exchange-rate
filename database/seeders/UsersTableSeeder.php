<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Abdullahi S',
            'email'    => 'asalihu@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::first();

        // Get the Admin role
        $admin = Role::where('name', 'admin')->first();

        $permissions = Permission::all();

        // Give all permissions to Admin
        $admin->givePermissionTo($permissions);

        // Assign Admin Role to user
        $user->syncRoles($role);
    }
}
