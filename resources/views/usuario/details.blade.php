@section('titulopage', 'Detalles de usuario')
@include('header')
<main class="container">
    
  
    <div class="my-3 p-3 bg-body rounded shadow-sm">     
      <div class="row">
    
        <div class="order-md-1">
          <h4 class="mb-3">Detalles del Cliente</h4>
          <table class="table table-striped">
           
            <tbody>                
              <tr>                
                <td>Nombre</td>
                <td>{{$datosdetallesusuario->Nombre}}</td>
                
              </tr>
              <tr>                
                <td>Apellido</td>
                <td>{{$datosdetallesusuario->Apellidos}}</td>                
              </tr>
              <tr>                
                <td>Correo Electrónico</td>
                <td>{{$datosdetallesusuario->CorreoElectronico}}</td>               
              </tr>
              <tr>                
                <td>Direccion</td>              
                <td>
                    @foreach ($datosClienteDetalles as $datositem)
                    - {{$datositem['Descripcion']}}<br>
                    @endforeach
                                    
                    {{-- {{$datosClienteDetalles->id}}                     --}}
                    {{-- {{$datosdetallesusuario->id}} --}}                    
                </td>   
                          
                {{-- @foreach ($datosClienteDetalles as $direccion)
                <td>
                    <tr>
                        <td>{{$direccion->Descripcion}}</td>
                    </tr>                   
                </td>   
                @endforeach              --}}
              </tr>
               
            </tbody>
          </table>
        </div>
      </div>    

      <a href="{{route('usuaios.lista')}}" class="btn btn-primary">Volver</a>
      
    </div>
    
  </main>
@include('footer')
