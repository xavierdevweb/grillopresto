<?php

namespace Database\Seeders;

use App\Models\Info_user;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userClient = new User();
        
        $userClient->id = 1;
        $userClient->info_user_id = 1;
        $userClient->email = 'client@hotmail.com';
        $userClient->password = Hash::make('Clientclient1@');
        $userClient->role_id = 1;


        $userAdmin = new User();
        
        $userAdmin->id = 2;
        $userAdmin->info_user_id = 2;
        $userAdmin->email = 'admin@hotmail.com';
        $userAdmin->password = Hash::make('Adminadmin1@');
        $userAdmin->role_id = 2;


        $userAdmin2 = new User();
        
        $userAdmin2->id = 5;
        $userAdmin2->info_user_id = 5;
        $userAdmin2->email = 'admin2@hotmail.com';
        $userAdmin2->password = Hash::make('Adminadmin2@');
        $userAdmin2->role_id = 3;


        $userAdmin3 = new User();
        
        $userAdmin3->id = 6;
        $userAdmin3->info_user_id = 6;
        $userAdmin3->email = 'admin3@hotmail.com';
        $userAdmin3->password = Hash::make('Adminadmin3@');
        $userAdmin3->role_id = 4;


        $userBlocked = new User();
        
        $userBlocked->id = 3;
        $userBlocked->info_user_id = 3;
        $userBlocked->email = 'blocked@blocked.com';
        $userBlocked->blocked_at = '2022-09-11 20:01:21';
        $userBlocked->password = Hash::make('Blockedblocked1@');
        $userBlocked->role_id = 1;


        $userDeleted = new User();
        
        $userDeleted->id = 4;
        $userDeleted->info_user_id = 4;
        $userDeleted->email = 'deleted@deleted.com';
        $userDeleted->soft_deleted = '2022-09-11 20:01:21';
        $userDeleted->password = Hash::make('Deleteddeleted1@');
        $userDeleted->role_id = 1;


        $userClient->save();
        $userAdmin->save();
        $userAdmin2->save();
        $userAdmin3->save();
        $userBlocked->save();
        $userDeleted->save();
    }
}
