<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuarios;
use App\Models\ClienteDireccion;
use App\Models\ClienteTelefono;
use App\Models\vListaUsuario;

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
        }else
        {
            $resultado =$guardarUsuario;
            return $resultado; 
        }        

        //$metodo = $this->clienteDireccion('hasdhfahsdf');
        // $guardar = $this->guardar('Enderson','Florian Solano','prueba@prueba.com');
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

        // try{
        //     $inventario = new Inventario();           
        //     $inventario->ID_Inventario = $request->producto;
        //     $inventario->ID_tipo_invrentarioRegistro = $request->tregistro;
        //     $inventario->ID_UsuarioRegistrado =1;
        //     $inventario->Cantidad = $request->cantidad;
        //     $inventario->save();
        // }catch(Exception $e){
        //     echo '<script language="javascript">alert("Error al guardar");</script>';
        // }
        
        // return redirect('/inventario/listaregistro');
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
