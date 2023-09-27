<?php
namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0');
//
//        DB::table('users')->truncate();
//
//        $this->call([ UsersTableSeeder::class]);
//
//        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        \App\Models\User::factory(10)->create();
        $roles = [['name' => 'کاربر عادی'], ['name' => 'ادمین'], ['name' => 'کاربر برنز'], ['name' => 'کاربر نقره'], ['name' => 'کاربر طلا']];
        foreach ($roles as $role)
            Role::create($role);

        $permissions=\userPermission::cases();
        foreach ($permissions as $permission)
        {
            Permission::create(['name'=> $permission->value]);
        }
    }
}
