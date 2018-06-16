<?php

namespace InetStudio\Dummies\Http\Responses\Back\Dummies;

use Illuminate\Contracts\Support\Responsable;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract;

/**
 * Class SaveResponse.
 */
class SaveResponse implements SaveResponseContract, Responsable
{
    /**
     * @var DummyModelContract
     */
    private $item;

    /**
     * SaveResponse constructor.
     *
     * @param DummyModelContract $item
     */
    public function __construct(DummyModelContract $item)
    {
        $this->item = $item;
    }

    /**
     * Возвращаем ответ при сохранении объекта.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function toResponse($request)
    {
        $this->item = $this->item->fresh();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $this->item->id,
            ], 200);
        } else {
            return response()->redirectToRoute('back.dummies.edit', [
                $this->item->id,
            ]);
        }
    }
}
