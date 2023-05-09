<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserCustom extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens, HasFactory, Notifiable;
    

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
        'fld_update',
        
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fld_IDrol', 'fld_id');
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}