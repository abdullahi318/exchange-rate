<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "id"=> 1,
                "name"=> "admin",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id"=> 2,
                "name"=> "user",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        Role::insert($roles);
    }
}
