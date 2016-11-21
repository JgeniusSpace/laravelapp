<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

/**
 * 基础仓库类
 *
 * Class BaseRepository
 * @package App\Repositories\Eloquent
 */
abstract class BaseRepository implements RepositoryInterface {

    /**
     * 应用对象
     *
     * @var Application
     */
    private $app;

    /**
     * Model 对象名称
     *
     * @var $model
     */
    protected $model;

    /**
     * Repository constructor.
     * @param Application $app
     */
    public function __construct(Application $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * model 方法
     *
     * @return mixed
     */
    abstract function model ();

    /**
     * 实现接口方法
     *
     * @param array $attributes
     * @return mixed
     */
    public function create (array $attributes) {
        return $this->model->fill($attributes)->save();
    }
    
    public function all() {
        return $this->model->all();
    }

    /**
     * 返回 model 对象
     *
     * @return Model|mixed
     * @throws RepositoryException
     */
    public function makeModel () {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("类 {$this->model()} 必须是一个 Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

}