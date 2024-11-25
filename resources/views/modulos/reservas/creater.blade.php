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
                <a href="{{ route('hotel.index') }}" class="btn bg-info">Volver</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header .bg-white">
                        <h3 class="text-primary">Crear Reservacion</h3>
                    </div>
                    <form action="{{ route('reserva.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                               
                            <div class="mb-3">
                                <label for="nombre_hotel" class="form-label h6">Nombre Hotel</label>
                                <input type="text" id="nombre_hotel" name="nombre_hotel"
                                       value="{{ $hotel->nombre }}" class="form-control-lg form-control" disabled>
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="tipo_habitacion" class="form-label h6">*Tipo De Habitación</label>
                                <select name="tipo_habitacion" id="tipo_habitacion" class="form-control-lg form-control">
                                    <option value="">Seleccione...</option>
                                    @foreach ($habitaciones as $habitacion)
                                        <option value="{{ $habitacion->id }}">
                                            {{ $habitacion->tipo_habitacion }} - {{ $habitacion->acomodacion }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo_habitacion')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label h6">*Cantidad</label>
                                <input type="number" id="cantidad" name="cantidad" class="form-control-lg form-control"
                                       value="{{ old('cantidad') }}" min="1" required>
                                @error('cantidad')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <h6> los campos con * son obligatorios</h6>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg bg-primary text-white">Crear Reserva</button>
                            </div>
                        </div>
                    </form>    
            </div>
        </div>
    </div>
   </div>
  </body>
</html>