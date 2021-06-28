<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //
    public function lista()
    {
        return view('usuario.index');
    }
    public function crearusuario()
    {       
        return view('usuario.crear');
    }
    public function guardarusuarios(Request $request)
    {
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $correoElectronico = $request->correoelectronico;
        $telefono = $request->telefono;
        $direccion = $request->grupo;
        return dd($direccion);
    }
}
