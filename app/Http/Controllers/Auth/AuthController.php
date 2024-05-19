<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\AreasUsuarios;
use App\Models\User;
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
            return redirect()->to('/login')->with('error','Error en alguno de los campos, intente nuevamente.');
        }

        //  Obtener la información del usuario
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if ($user->activo == '0') {
            return redirect('/login')->with('error', 'Usuario inactivo, si ocurrio algun error por favor comuniquese con algun administrador de la plataforma.');
        } else {
            //  En caso de pertenecer a un área, obtener esa área
            $area = AreasUsuarios::where('usuario_id', '=', $user->id)->get();

            if ($user->id_tipo == 3 && count($area) == 0) {
                return redirect('/login')->with('error', 'El usuario no cuenta con un área registrada, por favor comuniquese con el encargado de área o con algun administrador de la plataforma.');
            } else {
                //  Asignar una variable de sesión con el área al que pertenece el usuario
                if ($user->id_tipo != 3 && $user->id_tipo != 4 && $user->id_tipo != 5) {
                    //  Loguear al usuario de tipo administrador
                    Auth::login($user);
                    $request->session()->put('session_area', 0);
                } else {
                    //  Loguear al usuario de tipo Encargado de Área, Secretaria o Invitado
                    Auth::login($user);
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

    public function perfil() {
        return view('Usuarios.perfil');
    }

    public function updateView() {
        return view('Usuarios.perfilEdit');
    }

    public function update(Request $request, User $id) {
        $rules = [
            'email' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'academico' => 'required',
        ];

        $message = [
            'email.required' => 'Es necesario llenar el campo',
            'nombre.required' => 'Es necesario llenar el campo',
            'app.required' => 'Es necesario llenar el campo',
            'apm.required' => 'Es necesario llenar el campo',
            'academico.required' => 'Es necesario llenar el campo',
        ];

        $this->validate($request, $rules, $message);

        $query = User::find($id->id);

        if ($request->file('foto')  !=  '') {
            $file = $request->file('foto');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = $query->foto;
        }

        $query->email = trim($request->email);
        $query->nombre = trim($request->nombre);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->gen = $request->genero;
        $query->fn = $request->fn;
        $query->foto = $foto2;
        $query->academico = trim($request->academico);
        $query->save();

        return redirect('perfil')->with('Cambios realizados con exito!');
    }
}
