<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Models\Rol;
use App\Models\Tipo_doc;
use App\Models\Negocio;
use App\Models\Propietario;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'pkid_usuario';
    public $incrementing = false; // Clave no autoincremental
    protected $keyType = 'string'; // Cambiado de 'varchar' a 'string' (mejor práctica en Laravel)
    public $timestamps = false;

    // Campos asignables masivamente
    protected $fillable = [
        'pkid_usuario', // Asegurar que está incluido
        //'pkfkt_doc', 
        'pri_nom', 
        'pri_ape',
        'correo_elec', 
        'password', 
        'fkid_rol',
    ];

    protected $hidden = [
        'password',
    ];

    // Evento creating para generar ID automático si no se proporciona
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->pkid_usuario)) {
                $model->pkid_usuario = 'USR-' . Str::uuid(); // Genera ID único
            }
        });
    }

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