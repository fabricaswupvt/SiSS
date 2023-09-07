@extends('layout.template')

@section('title', 'Datos Lugar de Prestacion')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
  <h2 class="text-center mb-5">Datos de lugar de prestación</h2>
    <form class="row g-3">

      {{--Informacion de lugar de prestracion--}}
      <label class="form-label mb-1" style="font-weight: bold;">Información de lugar de prestación</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">RFC</label>
              <input type="text" class="form-control" name="rfc" id="rfc" value="{{old('rfc')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de lugar de prestación</label>
              <input type="text" class="form-control" name="nombre_lp" id="nombre_lp" value="{{old('nombre_lp')}}">
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
              <input type="text" class="form-control" name="giro" id="giro" value="{{old('giro')}}">
            </div>
          </div>
          {{--Informacion de Dirección--}}
          <label class="form-label mb-1" style="font-weight: bold;">Información de Dirección:</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">Calle</label>
              <input type="text" class="form-control" name="calle" id="calle" value="{{old('calle')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Exterior</label>
              <input type="text" class="form-control" name="no_ext" id="no_ext" value="{{old('no_ext')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Interior</label>
              <input type="text" class="form-control" name="no_int" id="no_int" value="{{old('no_int')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Referencia para llegar</label>
              <input type="text" class="form-control" name="referencia" id="referencia" value="{{old('referencia')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Colonia</label>
              <input type="text" class="form-control" name="nombre_col" id="nombre_col" value="{{old('nombre_col')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Código postal</label>
              <input type="text" class="form-control" name="cp" id="cp" value="{{old('cp')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="nombre_ciudad" id="nombre_ciudad" value="{{old('nombre_ciudad')}}">
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
            <div class="col-md-4">
              <label class="form-label">Estado</label>
              <input type="text" class="form-control" name="nombre_edo" id="nombre_edo" value="{{old('nombre_edo')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Municipio</label>
              <input type="text" class="form-control" name="nombre_num" id="nombre_num" value="{{old('nombre_num')}}">
            </div>
          </div>
          {{--Informacion de Responsable del lugar de prestación--}}
          <label class="form-label mb-1" style="font-weight: bold;">Información del responsable del lugar de prestación:</label>
          <div class="row">
          <div class="col-md-4">
              <label class="form-label">Nombre del departamento</label>
              <input type="text" class="form-control" name="nombre_depto" id="nombre_depto" value="{{old('nombre_depto')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre del responsable</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" name="ape_pat" id="ape_pat" value="{{old('ape_pat')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido materno</label>
              <input type="text" class="form-control" name="ape_mat" id="ape_mat" value="{{old('ape_mat')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Título</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="{{old('titulo')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Cargo</label>
              <input type="text" class="form-control" name="cargo_responsable" id="cargo_responsable" value="{{old('cargo_responsable')}}">
            </div>
          </div>

          {{--Informacion del responsable--}}
        <label class="form-label mb-1" style="font-weight: bold;">Contacto con responsable:</label>
        <div class="row">
            <div class="col-md-4">
              <label class="form-label">Teléfono fijo</label>
              <input type="text" class="form-control" name="telefono_fijo" id="telefono_fijo" value="{{old('telefono_fijo')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono celular</label>
              <input type="text" class="form-control" name="celular" id="celular" value="{{old('celular')}}">
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono de referencia</label>
              <input type="text" class="form-control" name="telefono_ref" id="telefono_ref" value="{{old('telefono_ref')}}">
            </div>
            <div class="col-md-4">
              <label for="exampleFormControlInput1" class="form-label">Correo</label>
              <input type="text" class="form-control" name="correo" id="correo" value="{{old('correo')}}">
            </div>
        </div> 
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success col-md-2 mx-2">Guardar</button>
          <a href="{{url('menu')}}" class="btn btn-success col-md-2 mx-2">Cancelar</a>
        </div>
        <div>
          
        </div>
      </form>


  </div>
</div>
@endsection
