<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model {
    protected $table = 'planes';
    protected $fillable = ['nombre', 'periodo_inicio', 'periodo_fin', 'estado', 'entidad_id', 'observacion'];
    public function entidad() { return $this->belongsTo(Entidad::class, 'entidad_id'); }
    public function programas() { return $this->hasMany(Programa::class); }
    public function objetivosEstrategicos() { return $this->hasMany(ObjetivoEstrategico::class); }
}