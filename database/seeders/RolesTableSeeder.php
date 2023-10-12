<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = \UserRole::cases();
        foreach ($roles as $role)
            Role::insert(['name'=>$role->name,'creator_id'=>1]);
    }
}
