<?php

namespace App\Repositories\Contracts;

/**
 * 仓库契约（接口）
 *
 * Interface RepositoryInterface
 * @package App\Repositories\Contracts
 */
interface RepositoryInterface {

    /**
     * 保存
     *
     * @param array $attributes
     * @return mixed
     */
    public function create (array $attributes);

    /**
     * 数据集合
     * @param $columns
     * @return mixed
     */
    public function all ($columns = ['*']);

    /**
     * 根据某个字段获取对应的数据集合
     * 
     * @param $filed 
     * @param $value
     * @return mixed
     */
    public function getByField ($filed, $value);
}