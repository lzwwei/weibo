<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
       	  
=======

>>>>>>> account-activation-password-resets
       $users = factory(User::class)->times(50)->make();
       User::insert($users->makeVisible(['password','remember_token'])->toArray());
       $user = User::find(1);
       $user->name = 'Summer';
       $user->email= 'summer@example.com';
<<<<<<< HEAD
       $user->is_admin=true;
=======
       $user->is_admin = true;
>>>>>>> account-activation-password-resets
       $user->save();
    }
}
