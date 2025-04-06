<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_doc;
use App\Models\Usuario;
use App\Models\Municipio;
use App\Models\Propietario;

class Negocio extends Model
{
    protected $table = 'negocios';
    protected $primaryKey = 'pknit_neg';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pknit_neg', 'nom_neg', 'direcc_neg', 'desc_neg',
        'fkid_mun', 'fkt_doc', 'fkid_usuario'
    ];

    public function tipo_documento(){
        return $this->belongsTo(Tipo_doc::class, 'fkt_doc', 'pkt_doc');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'fkid_usuario', 'pkid_usuario');
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'fkid_mun', 'pkid_mun');
    }

    public function propietario(){
        return $this->hasOne(Propietario::class, 'pkfkid_usuario', 'fkid_usuario');
    }
}
