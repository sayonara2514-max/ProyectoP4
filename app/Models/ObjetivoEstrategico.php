<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ObjetivoEstrategico extends Model {
    protected $table = 'objetivo_estrategicos';
    protected $fillable = ['codigo', 'descripcion', 'entidad_id', 'estado', 'fecha_registro'];
    public function entidad() { return $this->belongsTo(Entidad::class); }
    public function planes() { return $this->belongsToMany(Plan::class, 'plan_objetivo'); }
}