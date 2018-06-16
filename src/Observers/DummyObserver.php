<?php

namespace InetStudio\Dummies\Observers;

use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Observers\DummyObserverContract;

/**
 * Class DummyObserver.
 */
class DummyObserver implements DummyObserverContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    protected $services;

    /**
     * DummyObserver constructor.
     */
    public function __construct()
    {
        $this->services['dummiesObserver'] = app()->make('InetStudio\Dummies\Contracts\Services\Back\DummiesObserverServiceContract');
    }

    /**
     * Событие "объект создается".
     *
     * @param DummyModelContract $item
     */
    public function creating(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->creating($item);
    }

    /**
     * Событие "объект создан".
     *
     * @param DummyModelContract $item
     */
    public function created(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->created($item);
    }

    /**
     * Событие "объект обновляется".
     *
     * @param DummyModelContract $item
     */
    public function updating(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->updating($item);
    }

    /**
     * Событие "объект обновлен".
     *
     * @param DummyModelContract $item
     */
    public function updated(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->updated($item);
    }

    /**
     * Событие "объект подписки удаляется".
     *
     * @param DummyModelContract $item
     */
    public function deleting(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->deleting($item);
    }

    /**
     * Событие "объект удален".
     *
     * @param DummyModelContract $item
     */
    public function deleted(DummyModelContract $item): void
    {
        $this->services['dummiesObserver']->deleted($item);
    }
}
