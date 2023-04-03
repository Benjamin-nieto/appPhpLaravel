<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'tbl_roles';
    protected $primaryKey = 'fld_id';
    public $timestamps = false;
    protected $fillable = [
        'fld_nombre',
        'fld_registro'
    ];
}