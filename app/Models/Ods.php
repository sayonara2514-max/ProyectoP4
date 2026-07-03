<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ods extends Model {
    protected $fillable = ['codigo', 'nombre', 'descripcion'];
    public function objetivos() { return $this->belongsToMany(ObjetivoEstrategico::class, 'alineaciones', 'ods_id', 'objetivo_estrategico_id'); }
}