<?php

namespace InetStudio\Dummies\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class DummiesServiceProvider.
 */
class DummiesServiceProvider extends ServiceProvider
{
    /**
     * Загрузка сервиса.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerConsoleCommands();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Регистрация привязки в контейнере.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerBindings();
    }

    /**
     * Регистрация команд.
     *
     * @return void
     */
    protected function registerConsoleCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                'InetStudio\Dummies\Console\Commands\SetupCommand',
                'InetStudio\Dummies\Console\Commands\CreateFoldersCommand',
            ]);
        }
    }

    /**
     * Регистрация ресурсов.
     *
     * @return void
     */
    protected function registerPublishes(): void
    {
        $this->publishes([
            __DIR__.'/../../config/dummies.php' => config_path('dummies.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/../../config/filesystems.php', 'filesystems.disks'
        );

        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateDummiesTables')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__.'/../../database/migrations/create_dummies_tables.php.stub' => database_path('migrations/'.$timestamp.'_create_dummies_tables.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Регистрация путей.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Регистрация представлений.
     *
     * @return void
     */
    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin.module.dummies');
    }

    /**
     * Регистрация привязок, алиасов и сторонних провайдеров сервисов.
     *
     * @return void
     */
    protected function registerBindings(): void
    {
        // Controllers
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesControllerContract', 'InetStudio\Dummies\Http\Controllers\Back\DummiesController');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesDataControllerContract', 'InetStudio\Dummies\Http\Controllers\Back\DummiesDataController');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Controllers\Back\DummiesUtilityControllerContract', 'InetStudio\Dummies\Http\Controllers\Back\DummiesUtilityController');
        
        // Events
        $this->app->bind('InetStudio\Dummies\Contracts\Events\Back\ModifyDummyEventContract', 'InetStudio\Dummies\Events\Back\ModifyDummyEvent');

        // Mails
        $this->app->bind('InetStudio\Dummies\Contracts\Mail\NewDummyMailContract', 'InetStudio\Dummies\Mail\NewDummyMail');

        // Models
        $this->app->bind('InetStudio\Dummies\Contracts\Models\DummyModelContract', 'InetStudio\Dummies\Models\DummyModel');

        // Notifications
        $this->app->bind('InetStudio\Dummies\Contracts\Notifications\NewDummyNotificationContract', 'InetStudio\Dummies\Notifications\NewDummyNotification');
        $this->app->bind('InetStudio\Dummies\Contracts\Notifications\NewDummyQueueableNotificationContract', 'InetStudio\Dummies\Notifications\NewDummyQueueableNotification');

        // Observers
        $this->app->bind('InetStudio\Dummies\Contracts\Observers\DummyObserverContract', 'InetStudio\Dummies\Observers\DummyObserver');
        
        // Repositories
        $this->app->bind('InetStudio\Dummies\Contracts\Repositories\DummiesRepositoryContract', 'InetStudio\Dummies\Repositories\DummiesRepository');
        
        // Requests
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract', 'InetStudio\Dummies\Http\Requests\Back\SaveDummyRequest');
        
        // Responses
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\DestroyResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Dummies\DestroyResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\FormResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Dummies\FormResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\IndexResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Dummies\IndexResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\SaveResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Dummies\SaveResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Dummies\ShowResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Dummies\ShowResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SlugResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Utility\SlugResponse');
        $this->app->bind('InetStudio\Dummies\Contracts\Http\Responses\Back\Utility\SuggestionsResponseContract', 'InetStudio\Dummies\Http\Responses\Back\Utility\SuggestionsResponse');
        
        // Services
        $this->app->bind('InetStudio\Dummies\Contracts\Services\Back\DummiesDataTableServiceContract', 'InetStudio\Dummies\Services\Back\DummiesDataTableService');
        $this->app->bind('InetStudio\Dummies\Contracts\Services\Back\DummiesObserverServiceContract', 'InetStudio\Dummies\Services\Back\DummiesObserverService');
        $this->app->bind('InetStudio\Dummies\Contracts\Services\Back\DummiesServiceContract', 'InetStudio\Dummies\Services\Back\DummiesService');
        $this->app->bind('InetStudio\Dummies\Contracts\Services\Front\DummiesServiceContract', 'InetStudio\Dummies\Services\Front\DummiesService');
        
        // Transformers
        $this->app->bind('InetStudio\Dummies\Contracts\Transformers\Back\DummyTransformerContract', 'InetStudio\Dummies\Transformers\Back\DummyTransformer');
        $this->app->bind('InetStudio\Dummies\Contracts\Transformers\Back\SuggestionTransformerContract', 'InetStudio\Dummies\Transformers\Back\SuggestionTransformer');
    }
}
