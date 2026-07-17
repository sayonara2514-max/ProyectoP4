<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PlanActividad extends Model {
    protected $table = 'plan_actividades';
    protected $fillable = ['nombre', 'descripcion', 'tipo', 'prioridad', 'presupuesto', 'porcentaje_avance', 'estado_actividad', 'responsable', 'unidad_responsable', 'fecha_inicio', 'fecha_fin', 'plan_id'];
    public function plan() { return $this->belongsTo(Plan::class); }
}