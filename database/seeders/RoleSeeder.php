<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = ['SuperAdmin', 'Admin', 'Member', 'Sales', 'Manager'];

        foreach ($roles as $r) {
            \DB::table('roles')->insert([
                'name' => $r,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
