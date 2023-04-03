<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'tbl_productos';
    protected $primaryKey = 'fld_id';
    public $timestamps = false;

    protected $fillable = [
        'fld_IDcat',
        'fld_nombre',
        'fld_descripcion',
        'fld_valor',
        'fld_estado',
        'fld_registro',
        'fld_IDuser',
        'fld_UpdateFecha',
        'fld_UpdateUser',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'fld_IDcat');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'fld_IDuser');
    }

    public function usuarioActualizacion()
    {
        return $this->belongsTo(User::class, 'fld_UpdateUser');
    }

    public function detalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'fld_IDproducto');
    }
}
