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
    function model () {
        return Menu::class;
    }

    /**
     * 菜单递归
     * 
     * @param $menus
     * @param int $pid
     * @return array|string
     */
    public function treeMenu ($menus, $pid = 0) {
        if (empty($menus)) {
            return '';
        }

        $menuArray = [];
        foreach ($menus as $key => $value) {
            if ($value['parent_id'] == $pid) {
                $menuArray[$key] = $value;
                $menuArray[$key]['child'] = self::treeMenu($menus, $value['id']);
            }
        }
        
        return $menuArray;
    }

    /**
     * 子菜单排序
     *
     * @param $menus
     * @return string

    public function sortTreeMenu ($menus) {
        if (!$menus) {
            return '';
        }
        foreach ($menus as &$menu) {
            if ($menu['child']) {
                $sort = array_column($menu['child'], 'sort');
                array_multisort($sort, SORT_ASC, $menu['child']);
            }
        }
        return $menus;
    }*/

    /**
     * 子菜单排序改进
     *
     * @return array|string
     */
    public function sortTreeMenu () {
        $menus = $this->model->orderBy('sort', 'desc')->get();
        if ($menus) {
            return $this->treeMenu($menus);
        }
        return "";
    }

    /**
     * 获取菜单列表
     *
     * @return array|string
     */
    public function getMenuList () {
        return $this->sortTreeMenu();
    }


}