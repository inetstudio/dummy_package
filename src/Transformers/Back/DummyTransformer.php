<?php

namespace InetStudio\Dummies\Transformers\Back;

use League\Fractal\TransformerAbstract;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Transformers\Back\DummyTransformerContract;

/**
 * Class DummyTransformer.
 */
class DummyTransformer extends TransformerAbstract implements DummyTransformerContract
{
    /**
     * Подготовка данных для отображения в таблице.
     *
     * @param DummyModelContract $item
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function transform(DummyModelContract $item): array
    {
        return [
            'id' => (int) $item->id,
            'created_at' => (string) $item->created_at,
            'updated_at' => (string) $item->updated_at,
            'actions' => view('admin.module.dummies::back.partials.datatables.actions', [
                'id' => $item->id,
            ])->render(),
        ];
    }
}
