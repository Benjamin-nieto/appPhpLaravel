<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'tbl_categorias';
    protected $primaryKey = 'fld_id';
    public $timestamps = false;
    protected $fillable = [
        'fld_nombre',
        'fld_descripcion',
    ];

    // Si la tabla tiene relaciones, puedes definirlas aquí
    // public function otrosModelos() {
    //     return $this->hasMany(OtroModelo::class, 'llave_foranea', 'llave_primaria');
    // }
}
