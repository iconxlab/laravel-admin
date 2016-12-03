<?php

namespace Iconxlab\LaravelAdmin\Managers;

use Iconxlab\LaravelAdmin\Exceptions\ModelCreateException;
use Iconxlab\LaravelAdmin\Exceptions\ModelDeleteException;
use Iconxlab\LaravelAdmin\Exceptions\ModelDoesntExistsException;
use Iconxlab\LaravelAdmin\Exceptions\ModelUpdateException;
use Iconxlab\LaravelAdmin\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Manager
 * @package Iconxlab\LaravelAdmin\Managers
 */
class Manager
{
    /**
     * @var Repository
     */
    private $models;

    /**
     * @param Repository $models
     */
    public function __construct(Repository $models)
    {
        $this->models = $models;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes = [])
    {
        $model = $this->models->getNew($attributes, false);

        if (!$model->save()) {
            throw new ModelCreateException;
        }

        return $model;
    }

    /**
     * @param $id
     * @param array $attributes
     * @return Model
     */
    public function update($id, array $attributes = [])
    {
        if (!($model = $this->models->find($id))) {
            throw new ModelDoesntExistsException;
        }

        foreach ($attributes as $name => $value) {
            $model->setAttribute($name, $value);
        }

        if (!$model->save()) {
            throw new ModelUpdateException;
        }

        return $model;
    }

    /**
     * @param $id
     * @return Model
     */
    public function delete($id)
    {
        if (!($model = $this->models->find($id))) {
            throw new ModelDoesntExistsException;
        }

        if (!$model->delete()) {
            throw new ModelDeleteException;
        }

        return $model;
    }
}
