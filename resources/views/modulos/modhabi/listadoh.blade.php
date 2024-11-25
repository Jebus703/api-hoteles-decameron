<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Decameron</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   <div class="bg-primary py-3">
        <h2 class="text-white text-center"> Hoteles Decameron</h2>
   </div>
   <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('habitacion.create') }}" class="btn btn-success">Crear Habitacion</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>  
            @endif      
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        <h3 class="text-primary">Habitaciones</h3>
                        <a href="{{ route('hotel.index') }}" class="btn btn-secondary">Volver</a>
                        
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th></th>
                                <th>Tipo De Habitacion</th>
                                <th>Acomodacion</th>
                                <th></th>
                                <th>Acciones</th>
                            </tr>
                            @if ($habitaciones->isNotEmpty())
                            @foreach ($habitaciones as $habitacione)
                            <tr>
                                <td>{{ $habitacione->id }}</td>
                                <td>-</td>
                                <td>{{ $habitacione->tipo_habitacion }}</td>
                                <td>{{ $habitacione->acomodacion }}</td>
                                 <td> </td>
                                <td>
                                    <a href="{{ route('habitacion.edit',$habitacione->id) }}" class="btn btn-info">Editar</a>
                                    <a href="#" onclick="borarhabitacione({{ $habitacione->id  }});" class="btn btn-danger">Borrar</a>
                                    <form id="borrar-habitacione-from-{{ $habitacione->id  }}" action="{{ route('habitacion.destroy',$habitacione->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                            
                            @endif
                   
                            
                        </table>
                    </div>
              </div>
            </div>
        </div>
   </div>
  </body>
</html>

<script>
    function borarhabitacione(id) {
        if (confirm("Seguro que desea borrar la habitacion?")) {
            document.getElementById("borrar-habitacione-from-"+id).submit();
        }
    }
</script>