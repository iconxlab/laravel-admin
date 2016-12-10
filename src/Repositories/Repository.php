<?php

namespace Iconxlab\LaravelAdmin\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository
 * @package Iconxlab\LaravelAdmin\Repositories
 */
class Repository
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @param bool $exists
     * @return Model
     */
    public function getNew($attributes = [], $exists = false)
    {
        return $this->model->newInstance($attributes, $exists);
    }

    /**
     * @param $id
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->query()->find($id, $columns);
    }

    /**
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * @param null $perPage
     * @param array $columns
     * @param string $pageName
     * @param null $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->model->query()->paginate($perPage, $columns, $pageName, $page);
    }

    /**
     * @param $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, array $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}
