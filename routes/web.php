<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RolController, EntidadController, PlanController,
    ObjetivoEstrategicoController, ProgramaController, ProyectoController,
    MetaController, IndicadorController, AuditoriaController};

Route::get('/', fn() => redirect('/dashboard'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::middleware('rol:Administrador')->group(function () {
        Route::resource('roles', RolController::class);
    });

    Route::middleware('rol:Administrador,Técnico de Planificación')->group(function () {
        Route::resource('entidades', EntidadController::class);
        Route::resource('planes', PlanController::class);
        Route::resource('programas', ProgramaController::class);
        Route::resource('proyectos', ProyectoController::class);
        Route::resource('metas', MetaController::class);
        Route::resource('indicadores', IndicadorController::class);
        Route::resource('objetivos', ObjetivoEstrategicoController::class);
    });

    Route::middleware('rol:Administrador,Auditor')->group(function () {
        Route::resource('auditorias', AuditoriaController::class)->only(['index', 'show']);
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';