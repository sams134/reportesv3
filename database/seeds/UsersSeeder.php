<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         // Crear Usuario developer
         $usuario = new User();
         $usuario->name = 'Samuel Mayorga';
         $usuario->username = 'sam';
         $usuario->password = bcrypt('ultima');
         $usuario->activo = 1;
         $usuario->email = 'sams134@gmail.com';
         $usuario->userType = '1';
         $usuario->save();
 
         // Crear Usuario Gerencia
         $usuario = new User();
         $usuario->name = 'Irma de Mayorga';
         $usuario->username = 'irma';
         $usuario->password = bcrypt('ultima');
         $usuario->activo = 1;
         $usuario->email = 'irma.mayorga@cmeamir.com';
         $usuario->userType = '2';
         $usuario->save();
 
         // Crear usuario administracion
         $usuario = new User();
         $usuario->name = 'Walter Reyes';
         $usuario->username = 'walter';
         $usuario->password = bcrypt('ultima');
         $usuario->activo = 1;
         $usuario->email = 'wreyes@cmeamir.com';
         $usuario->userType = '3';
         $usuario->save();
 
         // Crear Usuario tecnico
         $usuario = new User();
         $usuario->name = 'Julio de Paz';
         $usuario->username = 'julio';
         $usuario->password = bcrypt('ultima');
         $usuario->activo = 1;
         $usuario->email = 'julio@cmeamir.com';
         $usuario->userType = '6';
         $usuario->save();
 
         // Crear Usuario Ayudante
         $usuario = new User();
         $usuario->name = 'Carlos Medrano';
         $usuario->username = 'medrano';
         $usuario->password = bcrypt('ultima');
         $usuario->activo = 1;
         $usuario->email = 'medrano@cmeamir.com';
         $usuario->userType = '7';
         $usuario->save();
 
    }
}
