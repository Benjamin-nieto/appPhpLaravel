<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;

    protected $table = 'tbl_pedidos_detalles';

    protected $fillable = [
        'fld_IDpedido',
        'fld_IDproducto',
        'fld_valor',
        'fld_cantidad',
        'fld_total',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'fld_IDpedido');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'fld_IDproducto');
    }
}
