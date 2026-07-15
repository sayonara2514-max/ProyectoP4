<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model {
    protected $fillable = ['nombre', 'presupuesto', 'fecha_inicio', 'fecha_fin', 'estado', 'programa_id', 'observacion'];
    public function programa() { return $this->belongsTo(Programa::class); }
    public function metas() { return $this->hasMany(Meta::class); }
}