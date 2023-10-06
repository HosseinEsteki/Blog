<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=\userPermission::cases();
        foreach ($permissions as $permission)
        {
            Permission::insert(['name'=> $permission->name,'creator_id'=>1]);
        }
    }
}
