<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;
use App\Models\Tipo_doc;
use App\Models\Municipio;
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
        return $this->belongsTo(Tipo_doc::class, 'pkfkt_doc', 'pkt_doc');
    }
    public function roles(){
        return $this->belongsTo(Rol::class, 'fkid_rol', 'pkid_rol');
    }
    public function municipios(){
        return $this->belongsTo(Municipio::class, 'fkid_mun', 'pkid_mun');
    }
}
