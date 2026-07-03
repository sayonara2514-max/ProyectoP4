<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model {
    protected $fillable = ['nombre', 'plan_id'];
    public function plan() { return $this->belongsTo(Plan::class); }
    public function proyectos() { return $this->hasMany(Proyecto::class); }
}