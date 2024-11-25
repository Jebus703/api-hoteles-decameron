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
                <a href="{{ route('habitacion.index') }}" class="btn bg-info">Volver</a>
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
                        <h3 class="text-primary">Editar Habitacion</h3>
                    </div>
                    <form action="{{ route('habitacion.update',$habitaciones) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Tipo Habitacion</label>
                                <input type="text" value="{{ old('tipo_habitacion',$habitaciones->tipo_habitacion) }}"
                                class="@error('tipo_habitacion') is-invalid @enderror form-control-lg form-control"
                                 name="tipo_habitacion" placeholder="Junior,Suite,Sencilla,Otro" >
                                    @error('tipo_habitacion')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Acomodacion</label>
                                <input type="text" value="{{ old('acomodacion',$habitaciones->acomodacion) }}"
                                class="@error('acomodacion') is-invalid @enderror form-control-lg form-control"
                                  name="acomodacion" placeholder="Doble,Triple,Cuadruple" >
                                    @error('acomodacion')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div>
                                <h6> los campos con * son obligatorios</h6>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg bg-primary text-white">Actualizar</button>
                            </div>
                        </div>
                    </form>    
            </div>
        </div>
    </div>
   </div>
  </body>
</html>