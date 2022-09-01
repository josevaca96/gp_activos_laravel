<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use\App\User;

class UsertwoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // creando 2 roles
         $rolAmin = Role::create([
            'name'    => 'root',
            'slug'   => 'root',
            'special' => 'all-access'
        ]);
        $rolSupervisor = Role::create([
            'name'    => 'supervisor',
            'slug'   => 'supervisor'
        ]);

        // creando 2 usuarios basicos
        $userAmin = User::create([
            'name'    => 'Administrador',
            'email'   => 'admin@grupopaz.com.bo',
            'password' => bcrypt('mpago20.22')
        ]);
        $userSupervisor = User::create([
            'name'    => 'Supervisor',
            'email'   => 'supervisor1@grupopaz.com.bo',
            'password' => bcrypt('celina0.124')
        ]);

        // asignando roles a los usuarios
        $rolAmin->users()->sync($userAmin);
        $rolSupervisor->users()->sync($userSupervisor);
    }
}
