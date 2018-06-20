<?php

namespace InetStudio\Dummies\Services\Back;

use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Services\Back\DummiesObserverServiceContract;

/**
 * Class DummiesObserverService.
 */
class DummiesObserverService implements DummiesObserverServiceContract
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

    /**
     * Событие "объект создается".
     *
     * @param DummyModelContract $item
     */
    public function creating(DummyModelContract $item): void
    {
    }

    /**
     * Событие "объект создан".
     *
     * @param DummyModelContract $item
     */
    public function created(DummyModelContract $item): void
    {
    }

    /**
     * Событие "объект обновляется".
     *
     * @param DummyModelContract $item
     */
    public function updating(DummyModelContract $item): void
    {
    }

    /**
     * Событие "объект обновлен".
     *
     * @param DummyModelContract $item
     */
    public function updated(DummyModelContract $item): void
    {
    }

    /**
     * Событие "объект подписки удаляется".
     *
     * @param DummyModelContract $item
     */
    public function deleting(DummyModelContract $item): void
    {
    }

    /**
     * Событие "объект удален".
     *
     * @param DummyModelContract $item
     */
    public function deleted(DummyModelContract $item): void
    {
    }
}
