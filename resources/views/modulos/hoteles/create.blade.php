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
                        <h3 class="text-primary">Crear Hotel</h3>
                    </div>
                    <form action="{{ route('hotel.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Nombre Hotel</label>
                                <input type="text"
                                    class="@error('nombre') is-invalid @enderror form-control-lg form-control" 
                                    name="nombre" placeholder="Nombre"  
                                    value="{{ $errors->has('nombre') ? '' : old('nombre') }}">
                                    @error('nombre')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Direccion Hotel</label>
                                <input type="text" value="{{ old('direccion') }}"
                                class="@error('direccion') is-invalid @enderror form-control-lg form-control"
                                 name="direccion" placeholder="Direccion" >
                                    @error('direccion')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Ciudad Hotel</label>
                                <input type="text" value="{{ old('ciudad') }}"
                                class="@error('ciudad') is-invalid @enderror form-control-lg form-control"
                                  name="ciudad" placeholder="Ciudad" >
                                    @error('ciudad')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Nit formato 12345678-9</label>
                                <input type="text" 
                                class="@error('nit') is-invalid  @enderror form-control-lg form-control" 
                                name="nit" placeholder="nit en formato 12345678-9"
                                value="{{ $errors->has('nit') ? '' : old('nit') }}">
                                    @error('nit')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h6">*Cantidad Habitaciones</label>
                                <input type="number" value="{{ old('cantidad') }}"
                                class="@error('cantidad') is-invalid @enderror form-control-lg form-control" 
                                name="cantidad" min="1"  >
                                    @error('cantidad')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div>
                                <h6> los campos con * son obligatorios</h6>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg bg-primary text-white">Crear</button>
                            </div>
                        </div>
                    </form>    
            </div>
        </div>
    </div>
   </div>
  </body>
</html>