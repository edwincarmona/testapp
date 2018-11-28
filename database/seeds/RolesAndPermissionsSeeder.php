<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard' => 'productos', 'name' => 'lector']);
        Permission::create(['guard' => 'productos', 'name' => 'autor']);
        Permission::create(['guard' => 'productos', 'name' => 'editor']);
        Permission::create(['guard' => 'productos', 'name' => 'gestor']);
        
        Permission::create(['guard' => 'clientes', 'name' => 'lector']);
        Permission::create(['guard' => 'clientes', 'name' => 'autor']);
        Permission::create(['guard' => 'clientes', 'name' => 'editor']);
        Permission::create(['guard' => 'clientes', 'name' => 'gestor']);
        Permission::create(['guard' => 'clientes', 'name' => 'credito']);

        Permission::create(['guard' => 'usuarios', 'name' => 'lector']);
        Permission::create(['guard' => 'usuarios', 'name' => 'autor']);
        Permission::create(['guard' => 'usuarios', 'name' => 'editor']);
        Permission::create(['guard' => 'usuarios', 'name' => 'gestor']);

    }
}