<?php

namespace Iconxlab\LaravelAdmin\Controllers;

use Iconxlab\LaravelAdmin\Managers\Manager;
use Iconxlab\LaravelAdmin\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;

/**
 * Class AdminController
 * @package Iconxlab\LaravelAdmin\Controllers
 */
class AdminController
{
    /**
     * @var Repository
     */
    private $models;

    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var ViewFactory
     */
    private $view;

    /**
     * @param Repository $models
     * @param Manager $manager
     */
    public function __construct(Repository $models, Manager $manager, ViewFactory $view)
    {
        $this->models = $models;
        $this->manager = $manager;
        $this->view = $view;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $paginator = $this->models->paginate();

        return $this->view->make("ixl-laravel-admin::show", compact('paginator'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $model = $this->models->find($id);

        return $this->view->make("ixl-laravel-admin::show", compact('model'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
