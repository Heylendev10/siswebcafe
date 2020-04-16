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
        DB::table('users')->delete();

        User::create(array(
            'id' => 1,
            'nombre' => 'Admin',
            'apellido' => 'Sistema',
            'documento' => '123456',
            'email' => 'admin@gmail.com',
            'password' => '12345',
            'rol' => 'Administrador',
            'fechanacimiento' => '1990-01-01',
            'genero' => 'M',
        ));
    }
}
