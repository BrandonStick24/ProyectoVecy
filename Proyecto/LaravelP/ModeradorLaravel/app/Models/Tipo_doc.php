<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Negocio;
class Tipo_doc extends Model
{
    protected $table = 'tipo_documento';
    protected $primaryKey = 'pkt_doc';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['pkt_doc', 'desc_doc'];

    //creacion de las relaciones.
    public function usuarios(){
        return $this->belongsToMany(Usuario::class,'propietarios');
    }
    public function negocios(){
        return $this->hasMany(Negocio::class, 'fkt_doc', 'pkt_doc');
    }
}

