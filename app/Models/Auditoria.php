<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model {
    public $timestamps = false;
    protected $fillable = ['user_id', 'modulo', 'accion', 'fecha_hora'];
    public function usuario() { return $this->belongsTo(User::class, 'user_id'); }
}
