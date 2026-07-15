<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RolController, EntidadController, PlanController,
    ObjetivoEstrategicoController, ProgramaController, ProyectoController,
    MetaController, IndicadorController, AuditoriaController};

Route::get('/', fn() => redirect('/dashboard'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    // Solo Administrador
    Route::middleware('rol:Administrador')->group(function () {
        Route::resource('roles', RolController::class);
        Route::get('usuarios', [\App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('usuarios/{usuario}/edit', [\App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::put('usuarios/{usuario}', [\App\Http\Controllers\UsuarioController::class, 'update'])->name('usuarios.update');
    });

    // Administrador y Tecnico
    Route::middleware('rol:Administrador,Técnico de Planificación')->group(function () {
        Route::resource('entidades', EntidadController::class);
        Route::resource('metas', MetaController::class);
        Route::resource('indicadores', IndicadorController::class);
        Route::resource('objetivos', ObjetivoEstrategicoController::class);
    });

    // Planes, Programas, Proyectos - acceso para todos los roles relevantes
    Route::middleware('rol:Administrador,Técnico de Planificación,Revisor Institucional,Autoridad Validante')->group(function () {
        Route::resource('planes', PlanController::class);
        Route::resource('proyectos', ProyectoController::class);
        Route::resource('programas', ProgramaController::class);
    });

    // Flujo de aprobacion de planes
    Route::post('planes/{plan}/enviar-revision', [PlanController::class, 'enviarRevision'])
        ->name('planes.enviarRevision')
        ->middleware('rol:Administrador,Técnico de Planificación');
    Route::post('planes/{plan}/validar', [PlanController::class, 'validar'])
        ->name('planes.validar')
        ->middleware('rol:Administrador,Revisor Institucional');
    Route::post('planes/{plan}/aprobar', [PlanController::class, 'aprobar'])
        ->name('planes.aprobar')
        ->middleware('rol:Administrador,Autoridad Validante');
    Route::post('planes/{plan}/devolver', [PlanController::class, 'devolver'])
        ->name('planes.devolver')
        ->middleware('rol:Administrador,Revisor Institucional,Autoridad Validante');

    // Flujo de aprobacion de proyectos
    Route::post('proyectos/{proyecto}/enviar-revision', [ProyectoController::class, 'enviarRevision'])
        ->name('proyectos.enviarRevision')
        ->middleware('rol:Administrador,Técnico de Planificación');
    Route::post('proyectos/{proyecto}/validar', [ProyectoController::class, 'validar'])
        ->name('proyectos.validar')
        ->middleware('rol:Administrador,Revisor Institucional');
    Route::post('proyectos/{proyecto}/aprobar', [ProyectoController::class, 'aprobar'])
        ->name('proyectos.aprobar')
        ->middleware('rol:Administrador,Autoridad Validante');
    Route::post('proyectos/{proyecto}/devolver', [ProyectoController::class, 'devolver'])
        ->name('proyectos.devolver')
        ->middleware('rol:Administrador,Revisor Institucional,Autoridad Validante');

    // Auditoria
    Route::middleware('rol:Administrador,Auditor')->group(function () {
        Route::resource('auditorias', AuditoriaController::class)->only(['index', 'show']);
    });

    // Perfil
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';