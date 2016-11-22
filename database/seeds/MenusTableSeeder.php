<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([

            'name' => '控制台',

            'parent_id' => '0',

            'url' => 'www.lvshilin.com',

        ]);

        $system = Menu::create([

            'name' => '系统管理',

            'parent_id' => '0',

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => '菜单管理',

            'parent_id' => $system->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => '用户管理',

            'parent_id' => $system->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => '权限管理',

            'parent_id' => $system->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => '角色管理',

            'parent_id' => $system->id,

            'url' => 'www.lvshilin.com',

        ]);

        $html = Menu::create([

            'name' => 'web前端',

            'parent_id' => '0',

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => 'ReactJs',

            'parent_id' => $html->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => 'JavaScript',

            'parent_id' => $html->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => 'AngularJs',

            'parent_id' => $html->id,

            'url' => 'www.lvshilin.com',

        ]);

        Menu::create([

            'name' => 'NodeJs',

            'parent_id' => $html->id,

            'url' => 'www.lvshilin.com',

        ]);
    }
}
