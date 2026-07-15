<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\{Proyecto, Plan, Programa, Meta, Indicador, ObjetivoEstrategico};
use App\Observers\AuditoriaObserver;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void {
        Route::bind('entidade', fn($value) => \App\Models\Entidad::findOrFail($value));
        Route::bind('plan', fn($value) => \App\Models\Plan::where('id', $value)->firstOrFail());
        Route::bind('plane', fn($value) => \App\Models\Plan::where('id', $value)->firstOrFail());
        Route::bind('indicadore', fn($value) => \App\Models\Indicador::findOrFail($value));
        Route::bind('role', fn($value) => \App\Models\Rol::findOrFail($value));

        Proyecto::observe(AuditoriaObserver::class);
        Plan::observe(AuditoriaObserver::class);
        Programa::observe(AuditoriaObserver::class);
        Meta::observe(AuditoriaObserver::class);
        Indicador::observe(AuditoriaObserver::class);
        ObjetivoEstrategico::observe(AuditoriaObserver::class);
    }
}