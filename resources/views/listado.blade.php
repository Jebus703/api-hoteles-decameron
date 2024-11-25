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
                <a href="{{ route('hotel.create') }}" class="btn btn-success">Crear Hotel</a>
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
                    <div class="card-header .bg-white">
                        <h3 class="text-primary">Hoteles</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Nit</th>
                                <th>Habitaciones</th>
                                <th>Reserva</th>
                                <th>Acciones</th>
                                
                            </tr>
                            @if ($hotel->isNotEmpty())
                            @foreach ($hotel as $hoteles)
                            <tr>
                                <td>{{ $hoteles->nombre }}</td>
                                <td>{{ $hoteles->direccion }}</td>
                                <td>{{ $hoteles->ciudad }}</td>
                                <td>{{ $hoteles->nit }}</td>
                                <td class="text-center">{{ $hoteles->max_habitaciones }}</td>
                                <td>
                                    <a href="{{ route('reserva.index',$hoteles->id) }}" class="btn btn-info">Reservar</a>
                                </td>
                                <td>
                                    <a href="{{ route('hotel.edit',$hoteles->id) }}" class="btn btn-info">Editar</a>
                                    <a href="#" onclick="borarhotel({{ $hoteles->id  }});" class="btn btn-danger">Borrar</a>
                                    <form id="borrar-hotel-from-{{ $hoteles->id  }}" action="{{ route('hotel.destroy',$hoteles->id) }}" method="post">
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
    function borarhotel(id) {
        if (confirm("Seguro que desea borrar el hotel?")) {
            document.getElementById("borrar-hotel-from-"+id).submit();
        }
    }
</script>