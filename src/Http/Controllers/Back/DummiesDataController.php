<?php

namespace InetStudio\Dummies\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesDataControllerContract;

/**
 * Class DummiesDataController.
 */
class DummiesDataController extends Controller implements DummiesDataControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    public $services;

    /**
     * DummiesController constructor.
     */
    public function __construct()
    {
        $this->services['dataTables'] = app()->make('InetStudio\Dummies\Contracts\Services\Back\DummiesDataTableServiceContract');
    }

    /**
     * Получаем данные для отображения в таблице.
     *
     * @return mixed
     */
    public function data()
    {
        return $this->services['dataTables']->ajax();
    }
}
