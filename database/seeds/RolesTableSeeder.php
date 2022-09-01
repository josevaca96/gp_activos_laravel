<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
            Permission::create([
                'name'        => 'Navegar Usuario',
                'slug'        => 'users.index',
                'description' => 'Lista y Navega todos los usuario del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de Usuario',
                'slug'        => 'users.show',
                'description' => 'Ver en detalle cada usuario del sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  Usuario',
                'slug'        => 'users.edit',
                'description' => 'Editar cualquier dato de un usuario del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar Usuario',
                'slug'        => 'users.destroy',
                'description' => 'Eliminar cualquier usuario del sistema',

            ]);

        //roles
            Permission::create([
                'name'        => 'Navegar roles',
                'slug'        => 'roles.index',
                'description' => 'Lista y Navega todos los roles del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de rol',
                'slug'        => 'roles.show',
                'description' => 'Ver en detalle cada rol del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de roles',
                'slug'        => 'roles.create',
                'description' => 'Crear roles en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  roles',
                'slug'        => 'roles.edit',
                'description' => 'Editar cualquier dato de un rol del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar rol',
                'slug'        => 'roles.destroy',
                'description' => 'Eliminar cualquier rol del sistema',

            ]);

        // empresas
            Permission::create([
                'name'        => 'Navegar empresas',
                'slug'        => 'empresas.index',
                'description' => 'Lista todos los empresas del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de empresa',
                'slug'        => 'empresas.show',
                'description' => 'Ver en detalle cada empresa del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de empresa',
                'slug'        => 'empresas.create',
                'description' => 'Crear empresa en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  empresa',
                'slug'        => 'empresas.edit',
                'description' => 'Editar cualquier dato de una empresa del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar empresa',
                'slug'        => 'empresas.destroy',
                'description' => 'Eliminar cualquier empresa del sistema',

            ]);
        // oficinas
            Permission::create([
                'name'        => 'Navegar oficinas',
                'slug'        => 'oficinas.index',
                'description' => 'Lista todos las oficinas del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de oficina',
                'slug'        => 'oficinas.show',
                'description' => 'Ver en detalle cada oficina del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de oficina',
                'slug'        => 'oficinas.create',
                'description' => 'crear oficina en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  oficina',
                'slug'        => 'oficinas.edit',
                'description' => 'Editar cualquier dato de una oficina del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar oficina',
                'slug'        => 'oficinas.destroy',
                'description' => 'Eliminar cualquier oficina del sistema',

            ]);
        // departamentos
            Permission::create([
                'name'        => 'Navegar departamentos',
                'slug'        => 'departamentos.index',
                'description' => 'Lista todos los departamentos del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de departamento',
                'slug'        => 'departamentos.show',
                'description' => 'Ver en detalle cada departamento del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de departamentos',
                'slug'        => 'departamentos.create',
                'description' => 'Crear departamento en el  sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  departamento',
                'slug'        => 'departamentos.edit',
                'description' => 'Editar cualquier dato de un departamento del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar departamento',
                'slug'        => 'departamentos.destroy',
                'description' => 'Eliminar cualquier departamento del sistema',

            ]);

        // activos
            Permission::create([
                'name'        => 'Navegar activos',
                'slug'        => 'activos.index',
                'description' => 'Lista todos los activos del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de activos',
                'slug'        => 'activos.show',
                'description' => 'Ver en detalle cada activo del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de activos',
                'slug'        => 'activos.create',
                'description' => 'Crear activo en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  activo',
                'slug'        => 'activos.edit',
                'description' => 'Editar cualquier dato de un activo del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar activo',
                'slug'        => 'activos.destroy',
                'description' => 'Eliminar cualquier activo del sistema',

            ]);

        // mantenimiento
            Permission::create([
                'name'        => 'Navegar mantenimientos',
                'slug'        => 'mantenimientos.index',
                'description' => 'Lista todos los mantenimientos del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de mantenimientos',
                'slug'        => 'mantenimientos.show',
                'description' => 'Ver en detalle cada Mantenimiento del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de mantenimiento',
                'slug'        => 'mantenimientos.create',
                'description' => 'Crear mantenimiento en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  mantenimiento',
                'slug'        => 'mantenimientos.edit',
                'description' => 'Editar cualquier dato de un mantenimiento del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar mantenimiento',
                'slug'        => 'mantenimientos.destroy',
                'description' => 'Eliminar cualquier mantenimiento del sistema',

            ]);

        // tipo de activo
            Permission::create([
                'name'        => 'Navegar tipo de activos',
                'slug'        => 'tipo_activos.index',
                'description' => 'Lista todos los tipo de activos del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de tipo de activos',
                'slug'        => 'tipo_activos.show',
                'description' => 'Ver en detalle cada tipo de activo del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de tipo de activos',
                'slug'        => 'tipo_activos.create',
                'description' => 'Crear un tipo de activo en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  tipo de activo',
                'slug'        => 'tipo_activos.edit',
                'description' => 'Editar cualquier dato de un tipo de activo del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar tipo de  activo',
                'slug'        => 'tipo_activos.destroy',
                'description' => 'Eliminar cualquier tipo de activo del sistema',

            ]);

        //asignaciones
            Permission::create([
                'name'        => 'Navegar asignaciones',
                'slug'        => 'asignaciones.index',
                'description' => 'Lista todas las asignaciones del sistema',

            ]);
            Permission::create([
                'name'        => 'Ver detalle de asignación',
                'slug'        => 'asignaciones.show',
                'description' => 'Ver en detalle cada asignación del sistema',

            ]);
            Permission::create([
                'name'        => 'Creacion de asignación',
                'slug'        => 'asignaciones.create',
                'description' => 'Crear una asignación en el sistema',

            ]);
            Permission::create([
                'name'        => 'Edicion de  asignación',
                'slug'        => 'asignaciones.edit',
                'description' => 'Editar cualquier dato de una asignación del sistema',

            ]);
            Permission::create([
                'name'        => 'Eliminar asignación',
                'slug'        => 'asignaciones.destroy',
                'description' => 'Eliminar cualquier asignación del sistema',

            ]);


    }
}
