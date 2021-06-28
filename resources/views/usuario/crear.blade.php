{{-- estilos css --}}
<style>
    form.d-flex {
    display: none !important;
}

</style>
{{-- finalestilos css --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

{{-- contenido de la pagina --}}
@section('titulopage', 'Agregar Nuevo Cliente')
@include('header')
<main class="container">  
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <form action="{{route('usuarios.guardar')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre</label>
              <input type="text" class="form-control"  name="nombre" aria-describedby="emailHelp" placeholder="Introduzca el Nombre">
              <small id="emailHelp" class="form-text text-muted">Favor de llenar este campo con su nombre</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Apellidos</label>
              <input type="text" class="form-control"  name="apellidos" aria-describedby="emailHelp" placeholder="Introduzca sus Apellidos">
             
              <label for="exampleInputEmail1">Correo Electrónico</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="correoelectronico" aria-describedby="emailHelp" placeholder="Introduzca su Correo Electrónico">
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Teléfono</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="telefono" placeholder="Introduzca su número de contacto">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Dirección</label>
                <table class="table"  id="tabla">
					<tr class="fila-fija">						
						<td><input class="form-control" placeholder="Dirección" required name="grupo[]" placeholder="Grupo"/></td>
						<td class="eliminar"><input id="btn1a" class="btn1" type="button"   value="Menos -"/></td>
					</tr>
				</table>
            </div>
            {{-- <div class="form-group">
                <label for="exampleInputPassword1">Dirección</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Dirección">
                <small id="emailHelp" class="form-text text-muted">Introduzca su Dirección</small>
                <button id="adicional" name="adicional" type="button" class="btn btn-warning">Agregar</button>
                <button id="adicional" name="adicional" type="button" class="btn btn-warning">Eliminar</button>
            </div> --}}
            <br>
            <div class="form-group">
            <button class="btn btn-primary">Guardar</button>
            <a href="{{route('usuaios.lista')}}" class="btn btn-danger">Cancelar</a>
            <button id="adicional" name="adicional" type="button" class="btn btn-warning">Agregar Direccion</button>
            
            </div>
          </form>
    </div>
  </main>
  {{-- scripts --}}
  <script>
			
    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");            
        });
     
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>
  {{-- final de scripts --}}
@include('footer')
