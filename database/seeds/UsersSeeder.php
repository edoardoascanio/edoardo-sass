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
        // factory(App\User::class,5)->create();

        $users = config('userList');

        foreach ($users as $user) {
            $new_user = new User();

            // $time = strtotime($user['birth_date']);

            // $newformat = date('Y-m-d', $time);
            // $new_user->birth_date = $newformat;

            $new_user->fill($user);

            $new_user->save();
        }
    }
}
