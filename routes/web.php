<?php

Route::group([
    'namespace' => 'InetStudio\Dummies\Contracts\Http\Controllers\Back',
    'middleware' => ['web', 'back.auth'],
    'prefix' => 'back',
], function () {
    Route::any('dummies/data', 'DummiesDataControllerContract@data')->name('back.dummies.data.index');
    Route::post('dummies/slug', 'DummiesUtilityControllerContract@getSlug')->name('back.dummies.getSlug');
    Route::post('dummies/suggestions', 'DummiesUtilityControllerContract@getSuggestions')->name('back.dummies.getSuggestions');

    Route::resource('dummies', 'DummiesControllerContract', ['as' => 'back']);
});
