<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model {
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'responsable', 'observaciones', 'plan_id'];
    protected $table = 'programas';
    public function plan() { return $this->belongsTo(Plan::class); }
    public function proyectos() { return $this->hasMany(Proyecto::class); }
    
}