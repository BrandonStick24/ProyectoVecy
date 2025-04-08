<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propietarios extends Model
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
        return $this->belongsTo(Usuarios::class, 'pkfkid_usuario', 'pkid_usuario');
    }

    public function tipo_documento(){
        return $this->belongsTo(Tipo_documento::class, 'pkfkt_doc', 'pkt_doc');
    }
}
