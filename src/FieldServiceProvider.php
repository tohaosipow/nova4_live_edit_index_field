<?php

namespace Antonosipov\NovaLiveEditField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Route;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::middleware(['nova'])
            ->prefix('live-update')
            ->group(__DIR__ . '/../routes.php');

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-live-edit-field', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-live-edit-field', __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
