<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'id_depa';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'nom_depa'
    ];
    public function municipios(){
        return $this->hasMany(Municipio::class, 'fkid_depa', 'id_depa');
    }
}
