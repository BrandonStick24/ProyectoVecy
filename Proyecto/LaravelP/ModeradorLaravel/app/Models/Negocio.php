<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_doc;
use App\Models\Usuario;
use App\Models\Municipio;
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
    public function usuarios(){
        return $this->belongsTo(Usuario::class, 'fkid_usuario', 'pkid_usuario');
    }
    public function municipios(){
        return $this->belongsTo(Municipio::class, 'fkid_mun', 'pkid_mun');
    }
    public function productos()
    {
    return $this->hasMany(Producto::class, 'fknit_neg', 'pknit_neg');
    }
}
