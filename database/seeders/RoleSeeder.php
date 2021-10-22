<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


//agregar de Spatie
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
    $role1 = Role::create(['name' => 'Admin']);
    $role2 = Role::create(['name' => 'Usuarios']);

    Permission::create(['name' => 'dash.index',
                        'description' =>'Ver el Dashboard'])->syncRoles($role1, $role2);

    // USER// 
    Permission::create(['name' => 'users.index',
                        'description' =>'Ver Listado de usuarios'])->syncRoles($role1);
    Permission::create(['name' => 'users.edit',
                        'description' =>'Asignar un rol'])->syncRoles($role1);

    //MEDIDOR
    Permission::create(['name' => 'medidor.index',
                        'description' =>'Ver Listado de medidores'])->syncRoles($role1,$role2);
    Permission::create(['name' => 'medidor.create',
                        'description' =>'Crear medidores'])->syncRoles($role1);
    Permission::create(['name' => 'medidor.edit',
                        'description' =>'Editar medidores'])->syncRoles($role1);
    Permission::create(['name' => 'medidor.destroy',
                        'description' =>'Eliminar medidores'])->syncRoles($role1);

    //SERVICIO
    Permission::create(['name' => 'servicio.index',
                        'description' =>'Ver listado de servicios'])->syncRoles($role1,$role2);
    Permission::create(['name' => 'servicio.create',
                        'description' =>'Crear servicio'])->syncRoles($role1);
    Permission::create(['name' => 'servicio.edit',
                        'description' =>'Editar servicio'])->syncRoles($role1);
    Permission::create(['name' => 'servicio.destroy',
                        'description' =>'eliminar servicio'])->syncRoles($role1);



    //TARIFA
    Permission::create(['name' => 'tarifa.index',
                        'description' =>'Ver listado de tarifas'])->syncRoles($role1,$role2);
    Permission::create(['name' => 'tarifa.create',
                        'description' =>'Crear tarifas'])->syncRoles($role1);
    Permission::create(['name' => 'tarifa.edit',
                        'description' =>'Editar tarifas'])->syncRoles($role1);
    Permission::create(['name' => 'tarifa.destroy',
                        'description' =>'Eliminar tarifas'])->syncRoles($role1);

    Permission::create(['name' => 'roles.index',
                        'description' =>'Ver istado de roles'])->syncRoles($role1, $role2);
    Permission::create(['name' => 'roles.create',
                        'description' =>'Crear rol'])->syncRoles($role1);                       
    Permission::create(['name' => 'roles.edit',
                        'description' =>'Editar rol'])->syncRoles($role1);
    Permission::create(['name' => 'roles.destroy',
                        'description' =>'Eliminar rol'])->syncRoles($role1);
                        

                        
    }
}
