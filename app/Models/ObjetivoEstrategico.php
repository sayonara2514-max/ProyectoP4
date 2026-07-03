<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ObjetivoEstrategico extends Model {
    protected $fillable = ['codigo', 'descripcion', 'plan_id'];
    public function plan() { return $this->belongsTo(Plan::class); }
    public function ods() { return $this->belongsToMany(Ods::class, 'alineaciones', 'objetivo_estrategico_id', 'ods_id'); }
    public function pdns() { return $this->belongsToMany(Pdn::class, 'alineaciones', 'objetivo_estrategico_id', 'pdn_id'); }
}