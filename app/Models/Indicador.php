<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model {
    protected $fillable = ['nombre', 'formula', 'unidad_medida', 'meta_id'];
    public function meta() { return $this->belongsTo(Meta::class); }
}
