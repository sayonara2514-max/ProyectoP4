<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
    protected $table = 'planes';
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'periodo_inicio', 'periodo_fin', 'estado', 'entidad_id', 'observacion'];
    public function entidad() { return $this->belongsTo(Entidad::class, 'entidad_id'); }
    public function programas() { return $this->hasMany(Programa::class); }
    public function objetivosEstrategicos() {return $this->belongsToMany(ObjetivoEstrategico::class, 'plan_objetivo');}
    public function ods() { return $this->belongsToMany(Ods::class, 'plan_ods'); }
    public function pdns() { return $this->belongsToMany(Pdn::class, 'plan_pdn'); }
    public function actividades() { return $this->hasMany(PlanActividad::class); }
}