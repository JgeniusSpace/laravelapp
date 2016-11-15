<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory('App\User')->create([
            'name' => '胡文勇',
            'username' => 'jgenius',
            'email' => 'jgenius@sina.com',
            'password' => bcrypt('111111'),
        ]);

        factory('App\User', 3)->create([
            'password' => bcrypt('111111')
        ]);
    }
}
