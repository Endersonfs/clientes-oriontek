@section('titulopage', 'Lista de Usuarios')
@include('header')
<main class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
      
      <a href="/usuario/crear" class="btn btn-primary">Agregar Nuevo Cliente</a>
    </div>
  
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h6 class="border-bottom pb-2 mb-0">Clientes Registrados</h6>      

      @foreach ($listaDeUsuarios as $usuarios)
      
      <div class="d-flex text-muted pt-3">
        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
  
        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
          <div class="d-flex justify-content-between">
            <strong class="text-gray-dark">{{$usuarios['Nombre']}} {{$usuarios['Apellidos']}}</strong>
            <a href="#">Ver mas</a>
          </div>
          <span class="d-block">{{$usuarios['CorreoElectronico']}}</span>
        </div>
      </div>  
      @endforeach

         
      
      <small class="d-block text-end mt-3">
        {{ $listaDeUsuarios->links() }}
      </small>
    </div>
  </main>
@include('footer')
