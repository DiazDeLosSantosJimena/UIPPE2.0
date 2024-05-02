<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AreasUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function show()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('sesiones.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        //  Validación
        if (!Auth::validate($credentials)) {
            return redirect()->to('/login')->withErrors('Error en alguno de los campos, intente nuevamente.');
        }

        //  Obtener la información del usuario
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($user->activo == '0') {
            return redirect('/login');
        } else {
            //  En caso de pertenecer a un área, obtener esa área
            $area = AreasUsuarios::where('usuario_id', '=', $user->id)->get();

            if ($user->id_tipo == 3 && count($area) == 0) {
                return redirect('/login');
            } else {
                //  Loguear al usuario
                Auth::login($user);
                
                //  Asignar una variable de sesión con el área al que pertenece el usuario
                if ($user->id_tipo != 3 && $user->id_tipo != 4 && $user->id_tipo != 5) {
                    $request->session()->put('session_area', 0);
                } else {
                    $request->session()->put('session_area', $area[0]->area_id);
                }
            }
        }

        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/dashboard');
    }
}
