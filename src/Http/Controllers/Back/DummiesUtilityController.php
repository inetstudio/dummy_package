<?php

namespace InetStudio\Dummies\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SlugResponseContract;
use InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesUtilityControllerContract;
use InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract;

/**
 * Class DummiesUtilityController.
 */
class DummiesUtilityController extends Controller implements DummiesUtilityControllerContract
{
    /**
     * Используемые сервисы.
     *
     * @var array
     */
    protected $services;

    /**
     * MessagesController constructor.
     */
    public function __construct()
    {
        $this->services['dummies'] = app()->make(
            'InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract'
        );
    }

    /**
     * Получаем slug для модели по строке.
     *
     * @param Request $request
     *
     * @return SlugResponseContract
     */
    public function getSlug(Request $request): SlugResponseContract
    {
        $name = $request->get('name');
        $slug = ($name) ? SlugService::createSlug(app()->make('InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SlugResponseContract'), 'slug', $name) : '';

        return app()->makeWith('InetStudio\Categories\Contracts\Http\Responses\Back\Utility\SlugResponseContract', [
            'slug' => $slug,
        ]);
    }

    /**
     * Возвращаем объекты для поля.
     *
     * @param Request $request
     *
     * @return SuggestionsResponseContract
     */
    public function getSuggestions(Request $request): SuggestionsResponseContract
    {
        $search = $request->get('q');
        $type = $request->get('type') ?? '';

        $suggestions = $this->services['dummies']->getSuggestions($search, $type);

        return app()->makeWith(
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract',
            compact('suggestions')
        );
    }
}
