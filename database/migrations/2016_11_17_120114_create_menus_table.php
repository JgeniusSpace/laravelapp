<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('菜单名称');
            $table->string('icon')->default('')->commit('菜单图标');
            $table->tinyInteger('parent_id')->default(0)->commit('父级菜单ID');
            $table->string('url')->default('')->commit('菜单链接');
            $table->string('heightlight_url')->default('')->commit('菜单高亮');
            $table->tinyInteger('sort')->unsigned()->default(0)->commit('菜单排序');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}