<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'tipo', 'sector_intervencion', 'fuente_financiamiento', 'presupuesto', 'presupuesto_ejecutado', 'ubicacion_geografica', 'fecha_inicio', 'fecha_fin', 'estado', 'observacion', 'programa_id'];
    public function programa() { return $this->belongsTo(Programa::class); }
    public function metas() { return $this->hasMany(Meta::class); }
}