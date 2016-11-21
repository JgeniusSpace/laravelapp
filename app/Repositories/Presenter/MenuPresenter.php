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
}