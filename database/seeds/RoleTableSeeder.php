<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrador = new Role();
        $role_administrador->name = 'ROLE_ADMINISTRADOR';
        $role_administrador->display_name = 'Administrador';
        $role_administrador->description = 'Usuario que se encarga de administrar usuarios, permisos y roles';
        $role_administrador->save();
    
        $role_coordinador = new Role();
        $role_coordinador->name = 'ROLE_COORDINADOR';
        $role_coordinador->display_name = 'Coordinador';
        $role_coordinador->description = 'Usuario qu puede administrar las salas y equipos de cómputo';
        $role_coordinador->save();

        $role_profesor = new Role();
        $role_profesor->name = 'ROLE_PROFESOR';
        $role_profesor->display_name = 'Profesor';
        $role_profesor->description = 'Usuario que unicamente puede consultar salas y equipos';
        $role_profesor->save();
    }
}
