<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "id"=> 1,
                "name"=> "asset_manage",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id"=> 2,
                "name"=> "market_show",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id"=> 3,
                "name"=> "buy stock",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id"=> 4,
                "name"=> "sell stock",
                "guard_name"=> "web",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
