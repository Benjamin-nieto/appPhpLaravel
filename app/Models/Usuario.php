<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'fld_id';
    protected $guarded = ['fld_id'];
    protected $fillable = [
        'fld_IDrol',
        'fld_nombre',
        'fld_correo',
        'fld_clave',
        'fld_estado',
        'fld_registro',
        'fld_IDuser',
        'fld_UpdateFecha',
        'fld_UpdateUser'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fld_IDrol', 'fld_id');
    }
}