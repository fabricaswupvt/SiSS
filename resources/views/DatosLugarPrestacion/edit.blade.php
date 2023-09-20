@extends('layout.template')

@section('title', 'Datos Lugar de Prestación')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2 class="text-center mb-5">Datos de lugar de prestación</h2>
    <form  method="post" class="row g-3">

      @csrf {{-- Agregar el token CSRF para proteger el formulario --}}
      @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      {{--Informacion de lugar de prestracion--}}
      <label class="form-label mb-1" style="font-weight: bold;">Información de lugar de prestación</label>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">RFC</label>
          <input type="text" class="form-control" name="rfc" id="rfc" value="{{$lugar_prestacion->rfc}}" required>
        </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de lugar de prestación</label>
              <input type="text" class="form-control" name="nombre_lp" id="nombre_lp" value="{{$lugar_prestacion->nombre_lp}}" required>
            </div>
            <div class="col-md-4">
              <label for="sector" class="form-label">Sector</label>
              <select class="form-select" aria-label="Default select example" name="sector" id="sector">
                <option selected>Selecciona una opción</option>
                <option value="publico" {{ old('sector') == 'publico' ? 'selected' : '' }}>Público</option>
                <option value="privado" {{ old('sector') == 'privado' ? 'selected' : '' }}>Privado</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Tipo</label>
              <select class="form-select" aria-label="Default select example" name="tipolp" id="tipolp">
                <option selected>Selecciona una opción</option>
                <option value="federal" {{ old('tipolp') == 'federal' ? 'selected' : '' }}>Federal</option>
                <option value="estatal" {{ old('tipolp') == 'estatal' ? 'selected' : '' }}>Estatal</option>
                <option value="municipal" {{ old('tipolp') == 'municipal' ? 'selected' : '' }}>Municipal</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Giro</label>
              <input type="text" class="form-control" name="giro" id="giro" value="{{$lugar_prestacion->giro}}" required>
            </div>
          </div>
          {{--Informacion de Dirección--}}
          <label class="form-label mb-1" style="font-weight: bold;">Información de Dirección:</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">Calle</label>
              <input type="text" class="form-control" name="calle" id="calle" value="{{$lugar_prestacion->direccion->calle}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Exterior</label>
              <input type="text" class="form-control" name="no_ext" id="no_ext" value="{{$lugar_prestacion->direccion->no_ext}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Interior</label>
              <input type="text" class="form-control" name="no_int" id="no_int" value="{{$lugar_prestacion->direccion->no_int}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Referencia para llegar</label>
              <input type="text" class="form-control" name="referencia" id="referencia" value="{{$lugar_prestacion->direccion->referencia}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Colonia</label>
              <input type="text" class="form-control" name="nombre_col" id="nombre_col" value="{{$colonia->nombre_col}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Código postal</label>
              <input type="text" class="form-control" name="cp" id="cp" value="{{$colonia->cp}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="nombre_ciudad" id="nombre_ciudad" value="{{$ciudad->nombre_ciudad}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Municipio</label>
              <input type="text" class="form-control" name="nombre_mun" id="nombre_mun" value="{{$municipio->nombre_mun}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Estado</label>
              <input type="text" class="form-control" name="nombre_edo" id="nombre_edo" value="{{$estado->nombre_edo}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">País</label>
              <select class="form-select" name="nombre_pais" id="nombre_pais" aria-label="Default select example">
                  <option selected>Selecciona una opción</option>
                  @foreach($paises as $pais)
                      <option value="{{ $pais }}">{{ $pais }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          {{--Informacion de Responsable del lugar de prestación--}}
          <label class="form-label mb-1" style="font-weight: bold;">Información del responsable del lugar de prestación:</label>
          <div class="row">
          <div class="col-md-4">
              <label class="form-label">Nombre del departamento</label>
              <input type="text" class="form-control" name="nombre_depto" id="nombre_depto" value="{{$departamento->nombre_depto}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre del responsable</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{$persona->nombre}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" name="ape_pat" id="ape_pat" value="{{$persona->ape_pat}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido materno</label>
              <input type="text" class="form-control" name="ape_mat" id="ape_mat" value="{{$persona->ape_mat}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Título</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="{{$persona->titulo}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Cargo</label>
              <input type="text" class="form-control" name="cargo" id="cargo" value="{{$supervisor->cargo}}" required>
            </div>
          </div>

          {{--Informacion del responsable--}}
        <label class="form-label mb-1" style="font-weight: bold;">Contacto con responsable:</label>
        <div class="row">
            <div class="col-md-4">
              <label class="form-label">Teléfono fijo</label>
              <input type="text" class="form-control" name="telefono_fijo" id="telefono_fijo" value="{{$contacto->telefono_fijo}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono celular</label>
              <input type="text" class="form-control" name="celular" id="celular" value="{{$contacto->celular}}" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono de referencia</label>
              <input type="text" class="form-control" name="telefono_ref" id="telefono_ref" value="{{$contacto->telefono_ref}}" required>
            </div>
            <div class="col-md-4">
              <label for="exampleFormControlInput1" class="form-label">Correo</label>
              <input type="text" class="form-control" name="correo" id="correo" value="{$contacto->correo}}" required>
            </div>
        </div> 
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success mx-2">Guardar</button>
          <a href="{{url('menu')}}" class="btn btn-success mx-2">Cancelar</a>
        </div>
        <div>
          
        </div>
      </form>

  </div>
</div>
@endsection
