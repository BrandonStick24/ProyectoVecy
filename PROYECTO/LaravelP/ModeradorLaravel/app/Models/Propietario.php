<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_doc;
use App\Models\Usuario;
class Propietario extends Model
{
    protected $table = 'propietarios';

    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'pkfkt_doc',
        'pkfkid_usuario',
    ];
    public function usuario(){
        return $this->belongsTo(Usuario::class, 'pkfkid_usuario', 'pkid_usuario');
    }

    public function tipo_documento(){
        return $this->belongsTo(Tipo_doc::class, 'pkfkt_doc', 'pkt_doc');
    }
}
