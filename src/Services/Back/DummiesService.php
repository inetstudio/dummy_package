<?php

namespace InetStudio\Dummies\Services\Back;

use League\Fractal\Manager;
use Illuminate\Support\Facades\Session;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract;
use InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract;
use InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract;

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

    /**
     * Получаем объект модели.
     *
     * @param int $id
     *
     * @return DummyModelContract
     */
    public function getDummyObject(int $id = 0)
    {
        return $this->repository->getItemByID($id);
    }

    /**
     * Получаем объекты по списку id.
     *
     * @param array|int $ids
     * @param array $extColumns
     * @param array $with
     * @param bool $returnBuilder
     *
     * @return mixed
     */
    public function getDummiesByIDs($ids, array $extColumns = [], array $with = [], bool $returnBuilder = false)
    {
        return $this->repository->getItemsByIDs($ids, $extColumns, $with, $returnBuilder);
    }

    /**
     * Сохраняем модель.
     *
     * @param SaveDummyRequestContract $request
     * @param int $id
     *
     * @return DummyModelContract
     */
    public function save(SaveDummyRequestContract $request, int $id): DummyModelContract
    {
        $action = ($id) ? 'отредактирован' : 'создан';
        $item = $this->repository->save($request->only($this->repository->getModel()->getFillable()), $id);

        event(app()->makeWith('InetStudio\Dummies\Contracts\Events\Back\ModifyDummyEventContract', [
            'object' => $item,
        ]));

        Session::flash('success', 'Объект «'.$item->title.'» успешно '.$action);

        return $item;
    }

    /**
     * Удаляем модель.
     *
     * @param $id
     *
     * @return bool
     */
    public function destroy(int $id): ?bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * Получаем подсказки.
     *
     * @param string $search
     * @param string $type
     * @param array $extColumns
     * @param array $with
     * @param bool $returnBuilder
     *
     * @return array
     */
    public function getSuggestions(string $search, string $type, array $extColumns = [], array $with = [], bool $returnBuilder = false): array
    {
        $items = $this->repository->searchItems([['name', 'LIKE', '%'.$search.'%']], $extColumns, $with, $returnBuilder);

        $resource = (app()->makeWith('InetStudio\Dummies\Contracts\Transformers\Back\SuggestionTransformerContract', [
            'type' => $type,
        ]))->transformCollection($items);

        $manager = new Manager();
        $manager->setSerializer(app()->make('InetStudio\AdminPanel\Contracts\Serializers\SimpleDataArraySerializerContract'));

        $transformation = $manager->createData($resource)->toArray();

        if ($type && $type == 'autocomplete') {
            $data['suggestions'] = $transformation;
        } else {
            $data['items'] = $transformation;
        }

        return $data;
    }
}
