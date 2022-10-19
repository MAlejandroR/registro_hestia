<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

use Illuminate\Support\Str;

class ControllerDatos extends Controller
{
    //
    public function index(request $request)
    {
        //Leer los datos
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $email = $request->email;
        /*TEMPORALMENTE LO VOY A HACER DIRECTAMENTE SOBRE UN FICHERO*/
        //Buscar en_ el fichero si existe ese nombre
        $path = 'alumnos.txt';
        $datos = "$nombre $apellido $email\n";

        $contenido = Storage::get($path);
        if (Str::contains($contenido,$nombre))
            $msj="El nombre <span style:color='red'$nombre</span> ya existe";
        else {
            Storage::put($path, $datos);
            $msj ="<pre>En breve se creará una cuenta en Hestia, con las siguientes credenciales:
                   \t\tUsuario: $nombre$apellido
                   \t\tPassword: $nombre$apellido
                   \t\tDominio:$nombre$apellido.infenlaces.com,
Recibirás confirmación en el correo <span style='color:red'>$email</span>
                   </pre>";
        }
        return Inertia::render('Main',['msj'=>$msj]);



    }
}
