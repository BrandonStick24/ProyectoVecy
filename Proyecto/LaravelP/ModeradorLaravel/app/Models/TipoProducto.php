<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    /**
     * Nombre de la tabla en la base de datos (opcional si sigue la convención de Laravel).
     * Por defecto, Laravel asume que la tabla se llama "tipo_productos" (plural en snake_case).
     */
    protected $table = 'tipo_producto'; // Solo necesario si la tabla no sigue la convención

    /**
     * Clave primaria personalizada (opcional).
     * Por defecto, Laravel asume que es "id".
     */
    protected $primaryKey = 'pkid_t_prod'; // Si tu clave primaria no es "id"

    /**
     * Campos asignables masivamente.
     */
    protected $fillable = [
        'cat_prod', // Solo si planeas usar create() o update() con este campo
    ];

    /**
     * Campos ocultos en respuestas JSON (opcional).
     */
    protected $hidden = [
        // Ejemplo: 'password',
    ];
}