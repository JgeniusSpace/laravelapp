<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Repositories\Eloquent\MenuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{

    private $menuRepository;

    /**
     * 构造方法注入Menu仓库
     *
     * MenusController constructor.
     * @param MenuRepository $menuRepository
     */
    public function __construct(MenuRepository $menuRepository) {
        $this->menuRepository = $menuRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuList = $this->menuRepository->getMenuList();

        $menuData = $this->menuRepository->getByField('parent_id', 0);

        return view('admin.menu.list')->with('menu', $menuData)->with('menuList', $menuList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MenuRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $bool = $this->menuRepository->create($request->all());
        if ($bool) {
            // 添加成功，刷新缓存
            $this->menuRepository->sortTreeMenu();
            flash('菜单添加成功', 'success');
        } else {
            flash('菜单添加失败', 'error');
        }
        return redirect('admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepository->editMenu($id);
        return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request)
    {
        $this->menuRepository->updateMenu($request);
        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
