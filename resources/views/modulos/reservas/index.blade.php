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
            <div class="col-md-10 d-flex justify-content-between align-items-center">
                <a href="{{ route('hotel.index') }}" class="btn btn-success ms-auto">Volver</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success') || (isset($mensaje) && $mensaje))
            <div class="col-md-10 mt-4">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (isset($mensaje) && $mensaje)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif
            </div>
        @endif
    
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-white">
                        @if (isset($mensaje) && $mensaje)
                            <a href="#" class="btn btn-info disabled" aria-disabled="true">Agregar Reserva</a>
                        @else
                            <a href="{{ route('reserva.create', ['hotel_id' => $hotel->id]) }}" class="btn btn-primary">Agregar Reserva</a>
                        @endif
                        <h3 class="text-primary mb-0">{{ $hotel->nombre }}</h3>
                        <a href="{{ route('habitacion.index') }}" class="btn btn-secondary">Ver Tipo de Habitaciones</a>
                    </div>
                    
                    
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Hotel</th>
                                <th>Tipo Habitacion</th>
                                <th>Acomodacion</th>
                                <th>Cantidad</th>
                            </tr>
                            @if ($reservas->isNotEmpty())
                            @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->nombre_hotel }}</td>
                                <td>{{ $reserva->tipo_habitacion }}</td>
                                <td>{{ $reserva->acomodacion }}</td>
                                <td>{{ $reserva->cantidad }}</td>
                                <td>
                                    

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
