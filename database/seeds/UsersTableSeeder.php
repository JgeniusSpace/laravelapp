<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        factory('App\User')->create([
            'name' => '胡文勇',
            'username' => 'jgenius',
            'email' => 'jgenius@sina.com',
            'password' => bcrypt('111111'),
        ])->each(function($u) use ($adminRole){
            $u->attachRole($adminRole);
        });

        factory('App\User', 3)->create([
            'password' => bcrypt('111111')
        ])->each(function ($u) use ($userRole) {
            $u->roles()->attach($userRole->id);
        });
    }
}
