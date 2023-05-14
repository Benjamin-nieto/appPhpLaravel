<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarma extends Model
{
    // use HasFactory;
    protected $table = 'tbl_alarmas';

    protected $primaryKey = 'fld_id';

    protected $fillable = [
        'fld_IDcliente',
        'fld_IDusuario', // usuario vendedor
        'fld_fecha',
        'fld_observacion',
        'fld_registro'
    ];
    protected $dates = ['fld_fecha', 'fld_registro'];
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fld_IDcliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fld_IDusuario');
    }
}
