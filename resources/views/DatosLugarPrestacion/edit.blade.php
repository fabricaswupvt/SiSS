@extends('layout.template')

@section('title', 'Datos Lugar de Prestación')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2 class="text-center mb-5">Datos de lugar de prestación</h2>
    <form method="post" action="{{ route('formularioLugarPrestacion.update', ['idlugar_prestacion' => $lugar_prestacion->idlugar_prestacion]) }}" class="row g-3">
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

      {{-- Informacion de lugar de prestracion --}}
      <label class="form-label mb-1" style="font-weight: bold;">Información de lugar de prestación</label>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">RFC</label>
          <input type="text" class="form-control" name="rfc" id="rfc" value="{{ $lugar_prestacion->rfc }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Nombre de lugar de prestación</label>
          <input type="text" class="form-control" name="nombre_lp" id="nombre_lp" value="{{ $lugar_prestacion->nombre_lp }}" required>
        </div>
        <div class="col-md-4">
          <label for="sector" class="form-label">Sector</label>
          <select class="form-select" aria-label="Default select example" name="sector" id="sector">
            <option selected>Selecciona una opción</option>
            <option value="publico" {{ old('sector', $lugar_prestacion->sector) == 'publico' ? 'selected' : '' }}>Público</option>
            <option value="privado" {{ old('sector', $lugar_prestacion->sector) == 'privado' ? 'selected' : '' }}>Privado</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Tipo</label>
          <select class="form-select" aria-label="Default select example" name="tipolp" id="tipolp">
            <option selected>Selecciona una opción</option>
            <option value="federal" {{ old('tipolp', $lugar_prestacion->tipolp) == 'federal' ? 'selected' : '' }}>Federal</option>
            <option value="estatal" {{ old('tipolp', $lugar_prestacion->tipolp) == 'estatal' ? 'selected' : '' }}>Estatal</option>
            <option value="municipal" {{ old('tipolp', $lugar_prestacion->tipolp) == 'municipal' ? 'selected' : '' }}>Municipal</option>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Giro</label>
          <input type="text" class="form-control" name="giro" id="giro" value="{{ $lugar_prestacion->giro }}" required>
        </div>
      </div>
      {{-- Informacion de Dirección --}}
      <label class="form-label mb-1" style="font-weight: bold;">Información de Dirección:</label>
      <div class="row">
        <div class="col-md-4">
          <label class="form-label">Calle</label>
          <input type="text" class="form-control" name="calle" id="calle" value="{{ $lugar_prestacion->direccion->calle }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Nº Exterior</label>
          <input type="text" class="form-control" name="no_ext" id="no_ext" value="{{ $lugar_prestacion->direccion->no_ext }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Nº Interior</label>
          <input type="text" class="form-control" name="no_int" id="no_int" value="{{ $lugar_prestacion->direccion->no_int }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Referencia para llegar</label>
          <input type="text" class="form-control" name="referencia" id="referencia" value="{{ $lugar_prestacion->direccion->referencia }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Colonia</label>
          <input type="text" class="form-control" name="nombre_col" id="nombre_col" value="{{ $lugar_prestacion->direccion->colonia->nombre_col }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Código postal</label>
          <input type="text" class="form-control" name="cp" id="cp" value="{{ $lugar_prestacion->direccion->colonia->cp }}" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Ciudad</label>
          <input type="text" class="form-control" name="nombre_ciudad" id="nombre_ciudad" value="{{ $lugar_prestacion->direccion->colonia->ciudad->nombre_ciudad }}" required>
        </div>
        <div class="col-md-4">
              <label class="form-label">Municipio</label>
              <input type="text" class="form-control" name="nombre_mun" id="nombre_mun" value="{{ $lugar_prestacion->direccion->colonia->ciudad->municipio->nombre_mun ?? '' }}" required>
            </div>
        <div class="col-md-4">
          <label class="form-label">Estado</label>
          @if ($lugar_prestacion->direccion)
              <input type="text" class="form-control" name="nombre_edo" id="nombre_edo" value="{{ $lugar_prestacion->direccion->colonia->ciudad->municipio->estado->nombre_edo ?? '' }}" required>
          @else
              <input type="text" class="form-control" name="nombre_edo" id="nombre_edo" value="" required>
          @endif

        </div>
        <div class="col-md-4" style="margin-bottom: 20px;">
  <label class="form-label">País</label>
  <select class="form-select" name="nombre_pais" id="nombre_pais" aria-label="Default select example">
    <option selected>Selecciona una opción</option>
    @foreach($paises as $pais)
      <option value="{{ $pais }}">{{ $pais }}</option>
    @endforeach
  </select>
</div>

<div class="d-flex justify-content-center" style="margin-top: 20px;">
  <button type="submit" class="btn btn-success mx-2">Guardar</button>
  <a href="{{url('menu')}}" class="btn btn-success mx-2">Cancelar</a>
</div>
    </form>
  </div>
</div>
@endsection
