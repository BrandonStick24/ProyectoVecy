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

    // Nombre de la tabla
    protected $table = 'usuarios';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'pkfkt_doc',
        'pkid_usuario',
        'pri_nom',
        'seg_nom',
        'pri_ape',
        'seg_ape',
        'correo_elec',
        'password',
        'fkid_rol'
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($valor)
    {
        $this->attributes['password'] = bcrypt($valor);
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(Tipo_doc::class, 'pkfkt_doc', 'pkid_doc');
    }
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'fkid_rol', 'pkid_rol');
    }
    public function negocios()
    {
        return $this->hasMany(Negocio::class, 'fkid_usuario', 'pkid_usuario');
    }
    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'pkfkid_usuario', 'pkid_usuario');
    }
    public static function buscarPorDocumento($tipoDoc, $numeroDoc)
    {
        return self::where('pkfkt_doc', $tipoDoc)
                   ->where('pkid_usuario', $numeroDoc)
                   ->first();
    }
}
