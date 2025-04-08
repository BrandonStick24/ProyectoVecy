<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'pkid_prod'; // Clave primaria personalizada
    
    protected $fillable = [
        'nom_prod',
        'desc_prod',
        'pre_prod',
        'est_prod',
        'fknit_neg',
        'fkid_t_prod'
    ];

    protected $casts = [
        'est_prod' => 'boolean',
        'pre_prod' => 'float',
    ];
    // Si necesitas relaciones
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'fkid_t_prod');
    }
    
    public function negocio()
    {
        return $this->belongsTo(Negocio::class, 'fknit_neg','pknit_neg');
    }
}