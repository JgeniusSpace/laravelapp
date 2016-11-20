<?php
namespace App\Repositories\Eloquent;

use App\Models\Menu;

/**
 * 菜单仓库类
 *
 * Class MenuRepository
 * @package App\Repositories\Eloquent
 */
class MenuRepository extends BaseRepository {

    /**
     * 实现父类的 model 方法
     * @return mixed
     */
    function model() {
        return Menu::class;
    }

}