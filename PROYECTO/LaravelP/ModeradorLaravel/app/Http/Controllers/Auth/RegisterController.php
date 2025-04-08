<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pri_nom' => ['required', 'string', 'max:35'],
            'seg_nom' => ['nullable', 'string', 'max:35'],
            'pri_ape' => ['required', 'string', 'max:35'],
            'seg_ape' => ['nullable', 'string', 'max:35'],
            'pkfkt_doc' => ['required', 'string', 'in:TI,CC'],
            'pkid_usuario' => ['required', 'string', 'max:15', 'unique:usuarios,pkid_usuario'],
            'correo_elec' => ['required', 'string', 'email', 'max:45', 'unique:usuarios,correo_elec'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'fkid_rol' => ['required', 'integer', 'in:1,2'], // 1=cliente, 2=vendedor

            // Campos adicionales solo si es vendedor
            'pknit_neg' => ['required_if:fkid_rol,2', 'string', 'max:10'],
            'nom_neg' => ['required_if:fkid_rol,2', 'string', 'max:65'],
            'direcc_neg' => ['required_if:fkid_rol,2', 'string', 'max:50'],
            'desc_neg' => ['nullable', 'string'],
            'fkt_doc' => ['required_if:fkid_rol,2', 'string', 'max:2'],
            'fkid_mun' => ['nullable', 'integer'],
        ]);
    }

    protected function create(array $data)
    {
        $user = Usuario::create([
            'pkfkt_doc' => $data['pkfkt_doc'],
            'pkid_usuario' => $data['pkid_usuario'],
            'pri_nom' => $data['pri_nom'],
            'seg_nom' => $data['seg_nom'] ?? null,
            'pri_ape' => $data['pri_ape'],
            'seg_ape' => $data['seg_ape'] ?? null,
            'correo_elec' => $data['correo_elec'],
            'password' => Hash::make($data['password']),
            'fkid_rol' => $data['fkid_rol'],
        ]);

        if ($data['fkid_rol'] == 2) {
            $user->negocio()->create([
                'pknit_neg' => $data['pknit_neg'],
                'nom_neg' => $data['nom_neg'],
                'direcc_neg' => $data['direcc_neg'],
                'desc_neg' => $data['desc_neg'] ?? null,
                'fkt_doc' => $data['fkt_doc'],
                'fkid_mun' => $data['fkid_mun'] ?? null,
                'fkid_usuario' => $user->pkid_usuario,
            ]);
        }

        return $user;
    }
}
