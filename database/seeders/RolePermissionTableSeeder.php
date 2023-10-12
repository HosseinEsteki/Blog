<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role=Role::whereName(\UserRole::Admin->name)->first();
        $permissions=Permission::all()->pluck('id');
        $role->permissions()->attach($permissions);
    }
}
