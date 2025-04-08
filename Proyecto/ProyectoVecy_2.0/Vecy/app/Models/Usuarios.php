<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Model
{
    use Notifiable;
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
        return $this->belongsTo(Tipo_documento::class, 'pkfkt_doc', 'pkid_doc');
    }
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'fkid_rol', 'pkid_rol');
    }
    public function negocios()
    {
        return $this->hasMany(Negocios::class, 'fkid_usuario', 'pkid_usuario');
    }
    public function propietario()
    {
        return $this->hasOne(Propietarios::class, 'pkfkid_usuario', 'pkid_usuario');
    }

}
