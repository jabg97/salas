<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrador  = Role::where('name', 'ROLE_ADMINISTRADOR')->first();
        $role_coordinador = Role::where('name', 'ROLE_COORDINADOR')->first();
        $role_profesor = Role::where('name', 'ROLE_PROFESOR')->first();      
    
        $administrador = new User();
        $administrador->name = 'Administrador ROOT';
        $administrador->email = 'administrador@example.com';
        $administrador->password = bcrypt('administrador');
        $administrador->save();
        $administrador->roles()->attach($role_administrador);

        $coordinador = new User();
        $coordinador->name = 'Coordinador Salas';
        $coordinador->email = 'coordinador@example.com';
        $coordinador->password = bcrypt('coordinador');
        $coordinador->save();
        $coordinador->roles()->attach($role_coordinador);

        $profesor = new User();
        $profesor->name = 'Profesor SuperO';
        $profesor->email = 'profesor@example.com';
        $profesor->password = bcrypt('profesor');
        $profesor->save();
        $profesor->roles()->attach($role_profesor);
    }
}
