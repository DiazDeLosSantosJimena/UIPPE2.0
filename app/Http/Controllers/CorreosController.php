<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correos;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReestablecerPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class CorreosController extends Controller
{
    public function recuperar()
    {
        //recuperar contrase!!
        return view('sesiones/recuperacion');
    }

    public function EnviarCorreo(Request $request){
        $email = $request->input('email');
        $consulta = User::where('email', '=', $email)
            ->get();

            $contacto = User::select('nombre')->where('email', '=', $email)
            ->get();

            if (count($consulta) == 0) {
                session()->flash('Error', 'Credenciales Incorrectas.');
                return redirect('recuperacion');
            } else {
                Mail::to($email)->send(new ReestablecerPassword($contacto));
                session()->flash('Exito', 'Revise su bandeja de entrada.');
                return redirect('recuperacion');
        }
    }

    public function EnviarCorreo2(Request $request){
        $email = $request->input('email');
        $consulta = User::where('email', '=', $email)
            ->get();
        //$user = User::select('id')->where('email', '=', $email)->get();
        $id = User::where('email', $email)->value('id');
        //$id = strval($idu);


        // Generar la URL con el token temporal
        $url = URL::temporarySignedRoute(
            'reset', // Nombre de la ruta a la que se accederá
            now()->addMinutes(15),// Tiempo de vida del token (10 minutos en este ejemplo)
            ['id' => $id] //id del usuario
        );

            if (count($consulta) == 0) {
                session()->flash('Error', 'Credenciales Incorrectas.');
                return redirect('recuperacion');
            } else {
                // Enviar la URL por correo electrónico
                Mail::to($email)->send(new ReestablecerPassword($url));
                session()->flash('Exito', 'Revise su bandeja de entrada.');
                return redirect('recuperacion');
                /*$data = array(
                    'destinatario'=> $email,
                    'asunto'=> "Recuperacion de Contraseña",
                    'url'=> $url,
                );
                Mail::send('mails.crecuperacion', compact('data'), function($message) use ($data){
                    $message->to($data['destinatario'],'Systema SIPPyEM')
                        ->subject($data['asunto']);
                    $message->from('hello@example.com', 'Soporte SIPPyEM');
                });*/
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function reset(Request $request)
    {
        //recuperar contrase!!
        $id = $request->input('id');
        return view('sesiones/reset', compact('id'));
    }

    public function passwordc(Request $request)
    {
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        $id = $request->input('id');


            if($pass1 == $pass2){
                User::where('id', $id)->update(array('password'=>bcrypt($pass1),));
                session()->flash('Exito', 'La contraseña se ha reestablecido correctamente.');
                return redirect('/');
            }else{
                session()->flash('Error', 'Las contraseñas no coinciden.');
                return redirect()->route('reset');   
            }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function enviados(Request $request){
        $correos = Correos::all();
        $usuarios = User::all();

        return view('mails.correos', compact('correos', 'usuarios'));
    }

    public function pcorreo(Request $request){
        /*MULTIPLES DESTINATARIOS*/ 
        /*$emails = ['eduhuwu@gmail.com', 'eduholvera@gmail.com', 'ff_lexus@hotmail.com'];*/

        /*Mail::send('mails.prueba', compact('data'), function($message) use ($emails){
            $message->to($emails)
                ->subject('nose');
            $message->from('hello@example.com', 'Eduardoh');
        });*/


        /*FORMULARIO*/

        $iddes= $request->input('destinatario');

        $cordes = User::where('id', $iddes)->value('email');

        $data = array(
            'destinatario'=> $cordes,
            'asunto'=> $request->input('asunto'),
            'mensaje'=> $request->input('mensaje'),
        );

        /*$destinatario = $request->input('destinatario');
            $asunto = $request->input('asunto');
            $mensaje = $request->input('mensaje');*/

        $datos = new Correos;
        $datos->Destinatario = $cordes;
        $datos->Asunto = $request->input('asunto');
        $datos->Contenido = $request->input('mensaje');
        $datos->Remitente = $request->input('id');
        $datos->save();


        Mail::send('mails.prueba', compact('data'), function($message) use ($data){
            $message->to($data['destinatario'],'Admin SIPPyEM')
                ->subject($data['asunto']);
            $message->from('hello@example.com', 'Soporte SIPPyEM');
        });


        return redirect('enviados');
        //return view('mails.prueba', compact('data'));


        /*Mail::send('mails.prueba', compact('data'), function($message){
            $message->to('eduholvera@gmail.com', 'Eduardoh')
                ->subject('nose');
            $message->from('hello@example.com', 'Eduardo2');
        });*/

        
    }
    public function prueba(Request $request){
        return view('mails/prueba');
    }
}