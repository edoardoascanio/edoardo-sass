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

        $users = config('userList');

        foreach ($users as $user) {
            $new_user = new User();

            $new_user->fill($user);

            $new_user->password =  FacadesApp::make('hash')->make($user['password']);

            $new_user->save();
        }
    }
}
