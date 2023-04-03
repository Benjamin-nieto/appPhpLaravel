<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;

    protected $table = 'tbl_productos_cat';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        // No hay columnas fillable
    ];
}
