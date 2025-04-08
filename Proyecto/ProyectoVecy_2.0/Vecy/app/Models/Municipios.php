<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    protected $primaryKey = 'pkid_mun';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'nom_mun',
        'fkid_depa'
    ];
    public function departamento(){
        return $this->belongsTo(Departamentos::class, 'fkid_depa', 'id_depa');
    }
}
