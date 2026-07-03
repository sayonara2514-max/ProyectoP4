<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model {
    protected $fillable = ['descripcion', 'valor_objetivo', 'periodo', 'proyecto_id'];
    public function proyecto() { return $this->belongsTo(Proyecto::class); }
    public function indicadores() { return $this->hasMany(Indicador::class); }
}