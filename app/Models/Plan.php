<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
    protected $fillable = ['nombre', 'periodo_inicio', 'periodo_fin', 'estado', 'entidad_id'];
    public function entidad() { return $this->belongsTo(Entidad::class); }
    public function programas() { return $this->hasMany(Programa::class); }
    public function objetivosEstrategicos() { return $this->hasMany(ObjetivoEstrategico::class); }
}