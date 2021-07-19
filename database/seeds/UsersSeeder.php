<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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

            $new_user->save();
        }
    }
}
