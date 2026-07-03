<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\{Proyecto, Plan, Programa, Meta, Indicador, ObjetivoEstrategico};
use App\Observers\AuditoriaObserver;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void {
        Proyecto::observe(AuditoriaObserver::class);
        Plan::observe(AuditoriaObserver::class);
        Programa::observe(AuditoriaObserver::class);
        Meta::observe(AuditoriaObserver::class);
        Indicador::observe(AuditoriaObserver::class);
        ObjetivoEstrategico::observe(AuditoriaObserver::class);
        Route::bind('entidade', function ($value) {
    return \App\Models\Entidad::findOrFail($value);
});
    }
}