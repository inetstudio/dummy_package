<?php

namespace InetStudio\Dummies\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class DummiesBindingsServiceProvider.
 */
class DummiesBindingsServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public $bindings = [
        // Controllers
        'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesControllerContract' => 'InetStudio\Dummies\Http\Controllers\Back\DummiesController',
        'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesDataControllerContract' => 'InetStudio\Dummies\Http\Controllers\Back\DummiesDataController',
        'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesUtilityControllerContract' => 'InetStudio\Dummies\Http\Controllers\Back\DummiesUtilityController',
        
        // Events
        'InetStudio\Dummies\Contracts\Events\Back\ModifyDummyEventContract' => 'InetStudio\Dummies\Events\Back\ModifyDummyEvent',

        // Mails
        'InetStudio\Dummies\Contracts\Mail\NewDummyMailContract' => 'InetStudio\Dummies\Mail\NewDummyMail',

        // Models
        'InetStudio\Dummies\Contracts\Models\DummyModelContract' => 'InetStudio\Dummies\Models\DummyModel',

        // Notifications
        'InetStudio\Dummies\Contracts\Notifications\NewDummyNotificationContract' => 'InetStudio\Dummies\Notifications\NewDummyNotification',
        'InetStudio\Dummies\Contracts\Notifications\NewDummyQueueableNotificationContract' => 'InetStudio\Dummies\Notifications\NewDummyQueueableNotification',

        // Observers
        'InetStudio\Dummies\Contracts\Observers\DummyObserverContract' => 'InetStudio\Dummies\Observers\DummyObserver',
        
        // Repositories
        'InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract' => 'InetStudio\Dummies\Repositories\DummiesRepository',
        
        // Requests
        'InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract' => 'InetStudio\Dummies\Http\Requests\Back\SaveDummyRequest',
        
        // Responses
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\DestroyResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Dummies\DestroyResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Dummies\FormResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Dummies\IndexResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Dummies\SaveResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\ShowResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Dummies\ShowResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SlugResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Utility\SlugResponse',
        'InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract' => 'InetStudio\Dummies\Http\Responses\Back\Utility\SuggestionsResponse',
        
        // Services
        'InetStudio\Dummies\Contracts\Services\Back\DummiesDataTableServiceContract' => 'InetStudio\Dummies\Services\Back\DummiesDataTableService',
        'InetStudio\Dummies\Contracts\Services\Back\DummiesObserverServiceContract' => 'InetStudio\Dummies\Services\Back\DummiesObserverService',
        'InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract' => 'InetStudio\Dummies\Services\Back\DummiesService',
        'InetStudio\Dummies\Contracts\Services\Front\DummiesServiceContract' => 'InetStudio\Dummies\Services\Front\DummiesService',
        
        // Transformers
        'InetStudio\Dummies\Contracts\Transformers\Back\DummyTransformerContract' => 'InetStudio\Dummies\Transformers\Back\DummyTransformer',
        'InetStudio\Dummies\Contracts\Transformers\Back\SuggestionTransformerContract' => 'InetStudio\Dummies\Transformers\Back\SuggestionTransformer',
    ];

    /**
     * Получить сервисы от провайдера.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesControllerContract',
            'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesDataControllerContract',
            'InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesUtilityControllerContract',
            'InetStudio\Dummies\Contracts\Events\Back\ModifyDummyEventContract',
            'InetStudio\Dummies\Contracts\Mail\NewDummyMailContract',
            'InetStudio\Dummies\Contracts\Models\DummyModelContract',
            'InetStudio\Dummies\Contracts\Notifications\NewDummyNotificationContract',
            'InetStudio\Dummies\Contracts\Notifications\NewDummyQueueableNotificationContract',
            'InetStudio\Dummies\Contracts\Observers\DummyObserverContract',
            'InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract',
            'InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\DestroyResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\ShowResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SlugResponseContract',
            'InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract',
            'InetStudio\Dummies\Contracts\Services\Back\DummiesDataTableServiceContract',
            'InetStudio\Dummies\Contracts\Services\Back\DummiesObserverServiceContract',
            'InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract',
            'InetStudio\Dummies\Contracts\Services\Front\DummiesServiceContract',
            'InetStudio\Dummies\Contracts\Transformers\Back\DummyTransformerContract',
            'InetStudio\Dummies\Contracts\Transformers\Back\SuggestionTransformerContract',
        ];
    }
}
