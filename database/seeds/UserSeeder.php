<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App as FacadesApp;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Alessio',
                'surname' => 'Tonielli',
                'email' => 'alessio@gmail.com',
                'birth_date' => '2001-01-01',
                'password' => '12345678'
            ],
            [
                'name' => 'Tommaso',
                'surname' => 'Cavaletti',
                'email' => 'tommaso@gmail.com',
                'birth_date' => '1994-01-01',
                'password' => '12345678'
            ],
            [
                'name' => 'Francesco',
                'surname' => 'Allera',
                'email' => 'francesco@gmail.com',
                'birth_date' => '1993-04-01',
                'password' => '12345678'
            ],
            [
                'name' => 'Edoardo',
                'surname' => 'Ascanio',
                'email' => 'edoardo@gmail.com',
                'birth_date' => '1992-03-01',
                'password' => '12345678'
            ],
            [
                'name' => 'Giulia',
                'surname' => 'Maggio',
                'email' => 'giulia@gmail.com',
                'birth_date' => '1991-02-01',
                'password' => '12345678'
            ],
        ];

        foreach ($users as $user) {
            $new_user = new User();

            $new_user->fill($user);

            $new_user->password = FacadesApp::make('hash')->make($user['password']);

            $new_user->save();
        }
    }
}
