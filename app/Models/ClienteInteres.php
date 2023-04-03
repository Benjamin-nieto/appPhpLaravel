<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteInteres extends Model
{
    use HasFactory;

    protected $table = 'tbl_cliente_interes';
    protected $primaryKey = 'fld_id';
    protected $fillable = [
        'fld_IDcliente',
        'fld_IDcategoria',
        'fld_observacion',
        'fld_fecha',
        'fld_IDuser',
        'fld_UpdateFecha',
        'fld_UpdateUser'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fld_IDcliente');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fld_IDcategoria');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'fld_IDuser');
    }

    public function usuarioActualizacion()
    {
        return $this->belongsTo(User::class, 'fld_UpdateUser');
    }
}