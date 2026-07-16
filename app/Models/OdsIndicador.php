<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdsIndicador extends Model
{
   protected $table = 'ods_indicadores';
   protected $fillable = ['codigo', 'descripcion', 'ods_meta_id'];
}
