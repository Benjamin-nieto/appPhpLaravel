<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'tbl_clientes';
    protected $primaryKey = 'fld_id';

    protected $fillable = [
        'fld_nombre',
        'fld_apellido',
        'fld_correo',
        'fld_pais',
        'fld_departamento',
        'fld_ciudad',
        'fld_direccion',
        'fld_nacimiento',
        'fld_estado',
        'fld_hijos',
        'fld_numero',
        'fld_registro',
        'fld_IDuser',
        'fld_UpdateUser',
        'fld_UpdateFecha',
        'fld_tipoDoc',
        'fld_docIdent',
    ];
}