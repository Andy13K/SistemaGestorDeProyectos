<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Definir los permisos
        $permissions = [
            'manage projects',
            'assign tasks',
            'view projects'
        ];

        // Verificar y crear los permisos si no existen
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Definir los roles y sus permisos asociados
        $roles = [
            'Administrador' => ['manage projects', 'assign tasks', 'view projects'],
            'Líder de proyecto' => ['assign tasks', 'view projects'],
            'Integrante de equipo' => ['view projects'],
            'Cliente' => ['view projects']
        ];

        // Verificar y crear los roles si no existen, luego sincronizar permisos
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($rolePermissions);
        }
    }
}
