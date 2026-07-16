<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdsMeta extends Model
{
    protected $table = 'ods_metas';
    protected $fillable = ['codigo', 'descripcion', 'ods_id'];
    public function ods() { return $this->belongsTo(Ods::class); }
    public function indicadores() { return $this->hasMany(OdsIndicador::class, 'ods_meta_id'); }
}
