<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $client = Role::create(['name' => 'client']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin,$client]);//->assignRole($admin);

        Permission::create(['name' => 'admin.index'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$admin,$client]);//->assignRole($admin)

        Permission::create(['name' => 'admin.products.create'])->syncRoles([$admin,$client]);//->assignRole($admin)
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$admin,$client]);//->assignRole($admin)

        Permission::create(['name' => 'admin.categories.index'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.categories.show'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.brands.index'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.departments.index'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.departments.show'])->assignRole([$admin]);//->assignRole($admin)
        Permission::create(['name' => 'admin.cities.show'])->assignRole([$admin]);//->assignRole($admin)
       
    }
}
