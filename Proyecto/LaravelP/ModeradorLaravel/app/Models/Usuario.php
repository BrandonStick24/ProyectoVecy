<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Rol;
use App\Models\Tipo_doc;
use App\Models\Negocio;
use App\Models\Propietario;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'pkid_usuario';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = [
        'pkfkt_doc', 
        'pri_nom', 
        'pri_ape',
        'correo_elec', 
        'password', 
        'fkid_rol',
        //'fkid_mun'
    ];

    protected $hidden = [
        'password',
    ];

    // Relaciones
    public function tipo_documento()
    {
        return $this->belongsToMany(Tipo_doc::class, 'propietarios');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fkid_rol', 'pkid_rol');
    }

    public function negocios()
    {
        return $this->hasMany(Negocio::class, 'fkid_usuario', 'pkid_usuario');
    }

    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'pkfkid_usuario', 'pkid_usuario');
    }
}
