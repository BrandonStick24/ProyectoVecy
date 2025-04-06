<?php

namespace App\Models;
//jjjjj
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;
use App\Models\Tipo_doc;
use App\Models\Negocio;
use App\Models\Propietario;
class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'pkid_usuario';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
         'pkfkt_doc', 'pri_nom', 'seg_nom', 'pri_ape', 'seg_ape',
        'correo_elec', 'password', 'fkid_rol','fkid_mun'
    ];
    public function tipo_documento(){
        return $this->belongsToMany(Tipo_doc::class, 'propietarios');
    }
    public function rol(){
        return $this->belongsTo(Rol::class, 'fkid_rol','pkid_rol');
    }
    public function negocios(){
        return $this->hasMany(Negocio::class, 'fkid_usuario', 'pkid_usuario');
    }
    public function propietario(){
    return $this->hasOne(Propietario::class, 'pkfkid_usuario', 'pkid_usuario');
}
}
