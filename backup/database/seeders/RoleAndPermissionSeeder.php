<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //// Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'edit',
            'delete',
            'create',
            'view',
            'check',
            'show'
        ];

        foreach($permissions as $per)
        {
            Permission::create(['name' => $per]);
        }

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('show');

        $role2 = Role::create(['name' => 'collector']);
        $role2->givePermissionTo('show');
        $role2->givePermissionTo('create');
        $role2->givePermissionTo('edit');
        $role2->givePermissionTo('delete');

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo('show');
        $role3->givePermissionTo('create');
        $role3->givePermissionTo('edit');
        $role3->givePermissionTo('delete');
        $role3->givePermissionTo('view');
        $role3->givePermissionTo('check');

        // gets all permissions

        // create demo users
        $user = \App\Models\User::create([
            'name' => 'user',
            'city' => 'karachi',
            'state' => 'sindh',
            'country' => 'pakistan',
            'phone' => '039209141',
            'address' => 'lorem ipsum',
            'email' => 'test@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret',
            'role' => 'User'
        ]);



         $user = \App\Models\User::create([
            'name' => 'malik',
            'city' => 'karachi',
            'state' => 'sindh',
            'country' => 'pakistan',
            'phone' => '039209141',
            'address' => 'lorem ipsum',
            'email' => 'malikahfaz123@gmail.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret',
            'role' => 'User'
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::create([
            'city' => 'karachi',
            'state' => 'sindh',
            'country' => 'pakistan',
            'phone' => '039209141',
            'address' => 'lorem ipsum',
            'name' => 'collector',
            'email' => 'collector@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret',
            'role' => 'Collector'
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::create([
            'city' => 'karachi',
            'state' => 'sindh',
            'country' => 'pakistan',
            'phone' => '039209141',
            'address' => 'lorem ipsum',
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret',
            'role' => 'Admin'
        ]);
        $user->assignRole($role3);
    }
}
