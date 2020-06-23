@extends('layouts.app')

@section('tittle', 'Bienvenido a Kamaleon Arte Decorativo')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
   
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar productos</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/admin/products') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Dimensiones</label>
                            <input type="text" class="form-control" name="dimensiones" value="{{ old('dimensiones') }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Estilo</label>
                            <input type="text" class="form-control" name="estilo" value="{{ old('estilo') }}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio') }}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                        </div>
                    </div>
                    <!-- <input class="datepicker form-control" type="text" value="03/12/2020"/> -->

                  
                    <input type="file" name="imagen" class="form-control-file" value="{{ old('imagen') }}">
                  
                    <!-- <div class="col-md-3">
                        <div class="form-group label-floating">
                        <input type="file" name="imagen" class="form-control-file" id="validatedCustomFile" required>
                          <button type="submit" class="btn btn-info">Seleccionar una imagen..</button>
                            
                            
                         </div>
                    </div> -->
                    <div class="col-sm-3">
                        <div class="form-group label-floating">
                            <label class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">
                        </div>
                    </div>

                    <!-- <div class="col-md-3">
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label"  data-date-format = "dd-mm-aaaa">Fecha</label>
                        <div class="col-10">
                           <input class="datepicker form-control" name="fecha" type="text"/>

                        </div>
                    </div>
                    </div> -->
                   

                    <br>
                    <button class="btn btn-success">Registrar</button>
                    <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>

                   
                </form>

        </div>    
    </div>

</div>

@include('includes.footer')
<!-- <script>
$ ( '.datepicker' ). datepicker ()
</script> -->
@endsection
