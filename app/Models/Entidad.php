<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model {
    protected $fillable = ['codigo', 'nombre', 'mision', 'vision', 'estructura', 'sector', 'subsector', 'nivel_gobierno', 'estado'];
    protected $table = 'entidads';
    public function getRouteKeyName(): string { return 'id'; }
    public function planes() { return $this->hasMany(Plan::class, 'entidad_id'); }
}