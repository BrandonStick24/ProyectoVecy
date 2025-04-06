<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    // Relación con la tabla de documentos
    public function tipoDocumento()
    {
        return $this->belongsTo(Tipo_doc::class, 'pkfkt_doc', 'pkt_doc');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'pkfkid_usuario', 'pkid_usuario');
    }
}
