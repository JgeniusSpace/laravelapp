<?php
namespace App\Repositories\Presenter;

class MenuPresenter {

    /**
     * 菜单的下拉列表
     *
     * @param array $menu
     * @return string
     */
    public function getMenu ($menu) {
        $option = "<option value='0'>顶级菜单</option>";
        if($menu) {
            foreach ($menu as $key => $value) {
                $option .= "<option value='$value->id'>$value->name</option>";
            }
        }
        return $option;
    }

    /**
     * 菜单列表
     *
     * @param $menus
     * @return string
     */
    public function getMenuList ($menus) {
        if ($menus) {
            $item = '';
            foreach ($menus as $key => $value) {
                $item .= $this->getNestableItem($value['id'], $value['name'], $value['child']);
            }
            return $item;
        }
        return "暂无菜单";
    }

    /**
     * 菜单视图
     *
     * @param $id
     * @param $name
     * @param $child
     * @return string
     */
    protected function getNestableItem ($id, $name, $child) {
        if ($child) {
            return $this->getHandleList($id, $name, $child);
        }
        return '<li class="dd-item dd3-item" data-id="' . $id . '">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">' . $name . '</div>
                </li>';
    }

    /**
     * 菜单是否有子菜单处理
     *
     * @param $id
     * @param $name
     * @param $child
     * @return string
     */
    protected function getHandleList ($id, $name, $child) {
        $handle = '<li class="dd-item dd3-item" data-id="' . $id . '">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">' . $name . '</div>
                            <ol class="dd-list">';
        foreach ($child as $key => $value) {
            $handle .= $this->getNestableItem($value['id'], $value['name'], $value['child']);
        }
        $handle .= '</ol></li>';
        return $handle;
    }
}