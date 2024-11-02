<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::insert([
            [
                "name"=>"admin"
            ],
            [
                "name"=>"user"
            ],
            [
                "name"=>"moderatore"
            ],
        ]);
        $user = User::create([
            "name" => "bojo",
            "email" => "bojo@gmail.com",
            "password" => bcrypt("bojobojo"), 
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $user->roles()->attach($adminRole);
    }
    }
   

