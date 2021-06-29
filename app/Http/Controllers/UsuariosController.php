<?php

namespace App\Http\Controllers;
use Http;

use Illuminate\Http\Request;

use App\Models\Usuarios;
use App\Models\ClienteDireccion;
use App\Models\ClienteTelefono;
use App\Models\vListaUsuario;
use App\Models\vUsuariosDetalles;
use App\Models\vClienteDireccion;

class UsuariosController extends Controller
{
    //
    public function lista()
    {
        $listaDeUsuarios = vListaUsuario::paginate(15);
        return view('usuario.index',compact('listaDeUsuarios'));
    }
    public function crearusuario()
    {       
        return view('usuario.crear');
    }
    public function usuariodetalles($detallesusuario)
    {
        $datosdetallesusuario = vUsuariosDetalles::find($detallesusuario);
        $datosClienteDetalles = vClienteDireccion::where('ID_Cliente','=',$detallesusuario)->get();
       
        return view('usuario.details',compact(['datosdetallesusuario','datosClienteDetalles']));
    }
    public function guardarusuarios(Request $request)
    {
        $nombre = $request->nombre;
        $apellidos = $request->apellidos;
        $correoElectronico = $request->correoelectronico;
        $telefono = $request->telefono;
        $direccion = $request->grupo;
        // almacenando datos del formulario
            //variables necesarias
            $resultado;
        
        $guardarUsuario = $this->guardar($nombre,$apellidos,$correoElectronico);
        if($guardarUsuario ==1)
        {
            // almacenando en direccion
            $guardarDireccionUsuario = $this->clienteDireccion($direccion);
            $resultado = "se guardo con exito";
            return view('usuario.crear');
        }else
        {
            $resultado =$guardarUsuario;
            return view('usuario.crear');
        }        

      
        return dd($resultado);
    }
    private function guardar($nombre,$apellidos,$correoElectronico)
    {
        // metodo para guardar la informaciones en la tabla de usuarios
        try
        {
            $usuarios = new Usuarios;
            $usuarios->Nombre = $nombre;
            $usuarios->Apellidos = $apellidos;
            $usuarios->CorreoElectronico = $correoElectronico;
            $usuarios->save();
            return 1;
        }
        catch(Exception $e)
        {
            return('Error al guardar, '.$e);
        }

        return 'Metodo guardar';
      
    }
    private function clienteDireccion($descripcion)
    {
        //variables necesarias
        $cantidadDeDirecciones = count($descripcion);
        //final de variables necesarias
        
        //almacenando en la tabla direcion Usuario
        foreach($descripcion as $des)
        {
            $usuarios = new Usuarios;
            $direcionUsuario = new ClienteDireccion;
            //capturando el ultimo usuario registrado        
            $ID_Usuarios = $usuarios->count();
            
            $direcionUsuario->ID_Cliente = $ID_Usuarios;
            $direcionUsuario->Descripcion = $des;
            $direcionUsuario->save();
        } 
        return 'Exito al guardar datos en Cliente direcion';
    }
}
