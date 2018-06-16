<?php

namespace InetStudio\Dummies\Services\Front;

use InetStudio\Dummies\Contracts\Services\Front\DummiesServiceContract;
use InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract;

/**
 * Class DummiesService.
 */
class DummiesService implements DummiesServiceContract
{
    /**
     * @var DummiesRepositoryContract
     */
    private $repository;

    /**
     * DummiesService constructor.
     *
     * @param DummiesRepositoryContract $repository
     */
    public function __construct(DummiesRepositoryContract $repository)
    {
        $this->repository = $repository;
    }
}
