<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'pkid_rol';
    public $incrementing = false;
    protected $keyType = 'int';
    protected $fillable = [
        'desc_rol'
    ];

    public function usuarios(){
        return $this->hasMany(Usuario::class, 'fkid_rol', 'pkid_rol');
    }
}
