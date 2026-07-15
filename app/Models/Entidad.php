<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model {
    protected $fillable = ['nombre', 'mision', 'estructura'];
    protected $table = 'entidads';
    public function getRouteKeyName(): string { return 'id'; }
    public function planes() { return $this->hasMany(Plan::class, 'entidad_id'); }
}