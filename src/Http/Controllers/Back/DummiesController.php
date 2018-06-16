<?php

namespace InetStudio\Dummies\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract;
use InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesControllerContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\ShowResponseContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\DestroyResponseContract;

/**
 * Class DummiesController.
 */
class DummiesController extends Controller implements DummiesControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    protected $services;

    /**
     * DummiesController constructor.
     */
    public function __construct()
    {
        $this->services['dummies'] = app()->make('InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract');
        $this->services['dataTables'] = app()->make('InetStudio\Dummies\Contracts\Services\Back\DummiesDataTableServiceContract');
    }

    /**
     * Список объектов.
     *
     * @return IndexResponseContract
     */
    public function index(): IndexResponseContract
    {
        $table = $this->services['dataTables']->html();

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract', [
            'data' => compact('table'),
        ]);
    }

    /**
     * Получение объекта.
     *
     * @param int $id
     *
     * @return ShowResponseContract
     */
    public function show(int $id = 0): ShowResponseContract
    {
        $item = $this->services['dummies']->getDummyObject($id);

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract', [
            'item' => $item,
        ]);
    }

    /**
     * Добавление объекта.
     *
     * @return FormResponseContract
     */
    public function create(): FormResponseContract
    {
        $item = $this->services['dummies']->getDummyObject();

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract', [
            'data' => compact('item'),
        ]);
    }

    /**
     * Создание объекта.
     *
     * @param SaveDummyRequestContract $request
     *
     * @return SaveResponseContract
     */
    public function store(SaveDummyRequestContract $request): SaveResponseContract
    {
        return $this->save($request);
    }

    /**
     * Редактирование объекта.
     *
     * @param int $id
     *
     * @return FormResponseContract
     */
    public function edit(int $id = 0): FormResponseContract
    {
        $item = $this->services['dummies']->getDummyObject($id);

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract', [
            'data' => compact('item'),
        ]);
    }

    /**
     * Обновление объекта.
     *
     * @param SaveDummyRequestContract $request
     * @param int $id
     *
     * @return SaveResponseContract
     */
    public function update(SaveDummyRequestContract $request, int $id = 0): SaveResponseContract
    {
        return $this->save($request, $id);
    }

    /**
     * Сохранение объекта.
     *
     * @param SaveDummyRequestContract $request
     * @param int $id
     *
     * @return SaveResponseContract
     */
    private function save(SaveDummyRequestContract $request, int $id = 0): SaveResponseContract
    {
        $item = $this->services['dummies']->save($request, $id);

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract', [
            'item' => $item,
        ]);
    }

    /**
     * Удаление объекта.
     *
     * @param int $id
     *
     * @return DestroyResponseContract
     */
    public function destroy(int $id = 0): DestroyResponseContract
    {
        $result = $this->services['dummies']->destroy($id);

        return app()->makeWith('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\DestroyResponseContract', [
            'result' => (!! $result === null),
        ]);
    }
}
