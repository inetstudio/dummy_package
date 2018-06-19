<?php

namespace InetStudio\Dummies\Services\Front;

use InetStudio\Dummies\Contracts\Services\Front\DummiesServiceContract;

/**
 * Class DummiesService.
 */
class DummiesService implements DummiesServiceContract
{
    /**
     * @var
     */
    public $repository;

    /**
     * DummiesService constructor.
     */
    public function __construct()
    {
        $this->repository = app()->make('InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract');
    }
}
