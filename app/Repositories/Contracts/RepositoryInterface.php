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
     * 
     * @return mixed
     */
    public function all ();
}