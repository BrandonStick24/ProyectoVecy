<?php

namespace App\Models;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
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
        return $this->belongsTo(Departamento::class, 'fkid_depa', 'id_depa');
    }
}
