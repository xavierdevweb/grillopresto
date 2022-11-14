<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $roleArray = ['Client', 'Admin_1', 'Admin_2', 'Admin_3'];

        foreach($roleArray as $role){
            Role::create([
                'role' => $role
            ]);
        }
    }
}
