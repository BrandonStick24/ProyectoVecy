<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    
    protected $table = 'tipo_producto'; 

   
    protected $primaryKey = 'pkid_t_prod'; 

    protected $fillable = [
        'cat_prod', 
    ];

    
    protected $hidden = [
        // Ejemplo: 'password',
    ];
}