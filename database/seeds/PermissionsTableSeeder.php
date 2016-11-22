<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([

            'name' => 'admin.system.login',

            'display_name' => '登录后台',

            'description' => '登录后台',

        ]);

        /**
         * 菜单权限
         */

        Permission::create([

            'name' => 'admin.menus.list',

            'display_name' => '菜单列表',

            'description' => '菜单列表',

        ]);

        Permission::create([

            'name' => 'admin.menus.add',

            'display_name' => '添加菜单',

            'description' => '添加菜单',

        ]);

        Permission::create([

            'name' => 'admin.menus.edit',

            'display_name' => '修改菜单',

            'description' => '修改菜单',

        ]);

        Permission::create([

            'name' => 'admin.menus.delete',

            'display_name' => '删除菜单',

            'description' => '删除菜单',

        ]);

        /*$permission = new Permission();
        $permission->name = 'create users';
        $permission->display_name = '创建用户';
        $permission->description = '创建用户';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'edit users';
        $permission->display_name = '修改用户';
        $permission->description = '修改用户';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'destroy users';
        $permission->display_name = '删除用户';
        $permission->description = '删除用户';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'ban users';
        $permission->display_name = '禁用用户';
        $permission->description = '禁用用户';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'login back';
        $permission->display_name = '登录后台';
        $permission->description = '登录后台';
        $permission->save();*/
    }
}
