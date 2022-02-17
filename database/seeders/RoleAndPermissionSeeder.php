<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'index pricetype']);
        Permission::create(['name' => 'show pricetype']);
        Permission::create(['name' => 'create pricetype']);
        Permission::create(['name' => 'edit pricetype']);
        Permission::create(['name' => 'delete pricetype']);

        $noaccount = Role::create(['name' => 'no account']);

        $customer = Role::create(['name' => 'customer']);

        $buyer = Role::create(['name' => 'buyer'])
            ->givePermissionTo(['index pricetype', 'show pricetype', 'create pricetype', 'edit pricetype']);

        $sales = Role::create(['name' => 'sales'])
            ->givePermissionTo(['index pricetype', 'show pricetype', 'create pricetype', 'edit pricetype']);

        $admin = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
        //verder gaan op pagina 84
    }
}
