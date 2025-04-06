<?php  // ¡Esta debe ser la PRIMERA línea del archivo!

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'descripcion', 'categoria'];
}