<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pdn extends Model {
    protected $fillable = ['codigo', 'nombre'];
    public function objetivos() { return $this->belongsToMany(ObjetivoEstrategico::class, 'alineaciones', 'pdn_id', 'objetivo_estrategico_id'); }
}