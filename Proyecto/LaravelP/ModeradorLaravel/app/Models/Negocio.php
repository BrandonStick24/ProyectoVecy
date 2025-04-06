<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table = 'negocios';

    protected $primaryKey = 'pknit_neg';

    public $timestamps = false;

    protected $fillable = [
        'pknit_neg',
        'nom_neg',
        'direcc_neg',
        'desc_neg',
        'fkid_mun',
        'fkt_doc',
        'fkid_usuario',
    ];
}
