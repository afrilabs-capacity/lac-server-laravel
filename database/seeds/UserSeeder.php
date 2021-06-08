<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=[[
                'email'=>'braimahjake@gmail.com',
                'phone'=>'07036066056',
                //'name'=>'admin',
                'reg_type'=>'admin',
                'password' =>'123456'],
                ['email'=>'regional@gmail.com',
                'phone'=>'07036066056',
                //'name'=>'admin',
                'reg_type'=>'regional',
                'password' =>'123456'],].
                ['email'=>'lawyer@gmail.com',
                'phone'=>'07036066056',
                //'name'=>'admin',
                'reg_type'=>'lawyer',
                'password' =>'123456'],]
            ];

            $user = User::create($user);
            if($user){
            $roleclient = Role::whereName('admin')->first();
            $user->assignRole($roleclient);	
            }
            

    }
}
