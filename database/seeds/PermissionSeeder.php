<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permisos = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'categoria-list',
            'categoria-create',
            'categoria-edit',
            'categoria-delete',
            'cliente-list',
            'cliente-create',
            'cliente-edit',
            'cliente-delete',
            'empleado-list',
            'empleado-create',
            'empleado-edit',
            'empleado-delete',
            'empleadoorden-list',
            'empleadoorden-create',
            'empleadoorden-edit',
            'empleadoorden-delete',
            'orden-list',
            'orden-create',
            'orden-edit',
            'orden-delete'
        ];

        foreach ($permisos as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
