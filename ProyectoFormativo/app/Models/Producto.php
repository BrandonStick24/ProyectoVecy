<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
