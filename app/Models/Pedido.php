<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'tbl_pedidos';

    protected $fillable = [
        'fld_referencia',
        'fld_IDcliente',
        'fld_IDusuario',
        'fld_total',
        'fld_estado',
        'fld_registro',
        'fld_UpdateFecha',
        'fld_UpdateUser'
    ];

    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'fld_IDpedido');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fld_IDcliente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'fld_IDusuario');
    }

    public function update_usuario()
    {
        return $this->belongsTo(Usuario::class, 'fld_UpdateUser');
    }
}