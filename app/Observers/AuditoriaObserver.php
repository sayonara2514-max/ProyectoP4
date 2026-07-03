<?php
namespace App\Observers;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class AuditoriaObserver {
    private function registrar(string $modulo, string $accion): void {
        if (Auth::check()) {
            Auditoria::create([
                'user_id'    => Auth::id(),
                'modulo'     => $modulo,
                'accion'     => $accion,
                'fecha_hora' => now(),
            ]);
        }
    }
    public function created($model): void  { $this->registrar(class_basename($model), 'crear'); }
    public function updated($model): void  { $this->registrar(class_basename($model), 'actualizar'); }
    public function deleted($model): void  { $this->registrar(class_basename($model), 'eliminar'); }
}