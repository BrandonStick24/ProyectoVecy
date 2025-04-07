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

    // 🚫 NO se define clave primaria porque usamos clave compuesta
    public $incrementing = false;

    // Las claves primarias son tipo string
    protected $keyType = 'string';

    // Desactiva timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden llenar en masa
    protected $fillable = [
        'pkfkt_doc',        // Tipo de documento (clave compuesta)
        'pkid_usuario',     // Número de documento (clave compuesta)
        'pri_nom',          // Primer nombre
        'seg_nom',          // Segundo nombre (opcional)
        'pri_ape',          // Primer apellido
        'seg_ape',          // Segundo apellido (opcional)
        'correo_elec',      // Correo electrónico
        'password',         // Contraseña
        'fkid_rol'          // Clave foránea del rol
    ];

    // Oculta la contraseña al serializar
    protected $hidden = [
        'password',
    ];

    // 🔐 Encripta automáticamente la contraseña al guardar
    public function setPasswordAttribute($valor)
    {
        $this->attributes['password'] = bcrypt($valor);
    }

    // 🔗 Relación: un usuario pertenece a un tipo de documento
    public function tipoDocumento()
    {
        return $this->belongsTo(Tipo_doc::class, 'pkfkt_doc', 'pkid_doc');
    }

    // 🔗 Relación: un usuario tiene un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'fkid_rol', 'pkid_rol');
    }

    // 🔗 Relación: un usuario puede tener muchos negocios
    public function negocios()
    {
        return $this->hasMany(Negocio::class, 'fkid_usuario', 'pkid_usuario');
    }

    // 🔗 Relación: un usuario puede ser propietario (1 a 1)
    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'pkfkid_usuario', 'pkid_usuario');
    }

    // 📦 Método para buscar por clave compuesta (opcional)
    public static function buscarPorDocumento($tipoDoc, $numeroDoc)
    {
        return self::where('pkfkt_doc', $tipoDoc)
                   ->where('pkid_usuario', $numeroDoc)
                   ->first();
    }
}
