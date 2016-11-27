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
                $item .= $this->getNestableItem($value['id'], $value['name'], $value['child'], $value['parent_id']);
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
     * @param int $parent_id 父级菜单ID
     * @return string
     */
    protected function getNestableItem ($id, $name, $child, $parent_id) {
        if ($child) {
            return $this->getHandleList($id, $name, $child, $parent_id);
        }
        return '<li class="dd-item dd3-item" data-id="' . $id . '">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">' . $name . $this->getActionButtons($id, $parent_id) . '</div>
                </li>';
    }

    /**
     * 菜单是否有子菜单处理
     *
     * @param $id
     * @param $name
     * @param $child
     * @param int $parent_id 父级菜单ID
     * @return string
     */
    protected function getHandleList ($id, $name, $child, $parent_id) {
        $handle = '<li class="dd-item dd3-item" data-id="' . $id . '">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">' . $name . $this->getActionButtons($id, $parent_id) . '</div>
                            <ol class="dd-list">';
        foreach ($child as $key => $value) {
            $handle .= $this->getNestableItem($value['id'], $value['name'], $value['child'], $value['parent_id']);
        }
        $handle .= '</ol></li>';
        return $handle;
    }

    /**
     * 是否有权限操作这些按钮
     *
     * @param $id
     * @param int $parent_id 父级菜单ID
     * @return string
     */
    protected function getActionButtons ($id, $parent_id) {
        $action = '<div class="pull-right action-buttons">';
        if (!$parent_id) {
            if (auth()->user()->can('admin.menus.add')) {
                $action .= ' <a href="javascript:;" data-pid="' . $id . '" class="btn-xs createMenu" data-toggle="tooltip" data-original-title="#"  data-placement="top"><i class="fa fa-plus"></i></a>';
            }
        }
        if (auth()->user()->can('admin.menus.edit')) {
            $action .= '<a href="javascript:;" data-href="' . url('admin/menu', $id) . '" class="btn-xs editMenu" data-toggle="tooltip" data-original-title="#"  data-placement="top"><i class="fa fa-pencil"></i></a>';
        }

        if (auth()->user()->can('admin.menus.delete')) {
            $action .= '<a href="javascript:;" data-id="##" class="btn-xs destoryMenu" data-original-title="##" data-toggle="tooltip"  data-placement="top"><i class="fa fa-trash"></i>
                <form action="#" method="POST" name="delete_item" style="display:none">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="_token" value="">
                </form>
            </a>';
        }
        $action .= '</div>';
        return $action;
    }

}