@extends('layout.template')

@section('title', 'Datos Lugar de Prestación')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <h2 class="text-center mb-5">Datos de lugar de prestación</h2>
    <form method="POST" action="{{ route('formularioLugarPrestacion.store') }}" class="row g-3">
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
                <input type="text" class="form-control" name="rfc" id="rfc" value="{{ old('rfc') }}" required>
                <div id="rfcFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de lugar de prestación</label>
              <input type="text" class="form-control" name="nombre_lp" id="nombre_lp" value="{{old('nombre_lp')}}" required>
              <div id="nombre_lpFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label for="sector" class="form-label">Sector</label>
              <select class="form-select" aria-label="Default select example" name="sector" id="sector" required>
                <option selected>Selecciona una opción</option>
                <option value="publico" {{ old('sector') == 'publico' ? 'selected' : '' }}>Público</option>
                <option value="privado" {{ old('sector') == 'privado' ? 'selected' : '' }}>Privado</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Tipo</label>
              <select class="form-select" aria-label="Default select example" name="tipolp" id="tipolp" required>
                <option selected>Selecciona una opción</option>
                <option value="federal" {{ old('tipolp') == 'federal' ? 'selected' : '' }}>Federal</option>
                <option value="estatal" {{ old('tipolp') == 'estatal' ? 'selected' : '' }}>Estatal</option>
                <option value="municipal" {{ old('tipolp') == 'municipal' ? 'selected' : '' }}>Municipal</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Giro</label>
              <input type="text" class="form-control" name="giro" id="giro" value="{{old('giro')}}" required>
              <div id="giroFeedback" class="invalid-feedback"></div>
            </div>
          </div>
          {{--Informacion de Dirección--}}
          <label class="form-label mb-1" style="font-weight: bold;">Información de Dirección:</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">Calle</label>
              <input type="text" class="form-control" name="calle" id="calle" value="{{old('calle')}}" required>
              <div id="calleFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Exterior</label>
              <input type="text" class="form-control" name="no_ext" id="no_ext" value="{{old('no_ext')}}" required>
              <div id="no_extFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Interior</label>
              <input type="text" class="form-control" name="no_int" id="no_int" value="{{old('no_int')}}" required>
              <div id="no_intFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Referencia para llegar</label>
              <input type="text" class="form-control" name="referencia" id="referencia" value="{{old('referencia')}}" required>
              <div id="referenciaFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Colonia</label>
              <input type="text" class="form-control" name="nombre_col" id="nombre_col" value="{{old('nombre_col')}}" required>
              <div id="nombre_colFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Código postal</label>
              <input type="text" class="form-control" name="cp" id="cp" value="{{old('cp')}}" required>
              <div id="cpFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Ciudad</label>
              <input type="text" class="form-control" name="nombre_ciudad" id="nombre_ciudad" value="{{old('nombre_ciudad')}}" required>
              <div id="nombre_ciudadFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Municipio</label>
              <input type="text" class="form-control" name="nombre_mun" id="nombre_mun" value="{{old('nombre_mun')}}" required>
              <div id="nombre_munFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Estado</label>
              <input type="text" class="form-control" name="nombre_edo" id="nombre_edo" value="{{old('nombre_edo')}}" required>
              <div id="nombre_edoFeedback" class="invalid-feedback"></div>
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
              <input type="text" class="form-control" name="nombre_depto" id="nombre_depto" value="{{old('nombre_depto')}}" required>
              <div id="nombre_deptoFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre del responsable</label>
              <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required>
              <div id="nombreFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" name="ape_pat" id="ape_pat" value="{{old('ape_pat')}}" required>
              <div id="ape_patFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido materno</label>
              <input type="text" class="form-control" name="ape_mat" id="ape_mat" value="{{old('ape_mat')}}" required>
              <div id="ape_matFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Título</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="{{old('titulo')}}" required>
              <div id="tituloFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Cargo</label>
              <input type="text" class="form-control" name="cargo" id="cargo" value="{{old('cargo')}}" required>
              <div id="cargoFeedback" class="invalid-feedback"></div>
            </div>
          </div>

          {{--Informacion del responsable--}}
        <label class="form-label mb-1" style="font-weight: bold;">Contacto con responsable:</label>
        <div class="row">
            <div class="col-md-4">
              <label class="form-label">Teléfono fijo</label>
              <input type="text" class="form-control" name="telefono_fijo" id="telefono_fijo" value="{{old('telefono_fijo')}}" required>
              <div id="telefono_fijoFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono celular</label>
              <input type="text" class="form-control" name="celular" id="celular" value="{{old('celular')}}" required>
              <div id="celularFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono de referencia</label>
              <input type="text" class="form-control" name="telefono_ref" id="telefono_ref" value="{{old('telefono_ref')}}" required>
              <div id="telefono_refFeedback" class="invalid-feedback"></div>
            </div>
            <div class="col-md-4">
              <label for="exampleFormControlInput1" class="form-label">Correo</label>
              <input type="text" class="form-control" name="correo" id="correo" placeholder="name@example.com" value="{{old('correo')}}" required>
              <div id="correoFeedback" class="invalid-feedback"></div>
            </div>
        </div> 
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success mx-2">Guardar</button>
          <a href="{{url('FormularioLugarP')}}" class="btn btn-success mx-2">Cancelar</a>
        </div>
        <div>
          
        </div>
      </form>

  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {

    function validarCampo(campoId, esValido, mensaje) {
        var campo = document.getElementById(campoId);
        var feedbackId = campoId + 'Feedback';
        var feedbackElement = document.getElementById(feedbackId);

        if (esValido) {
            campo.classList.remove('is-invalid');
            campo.classList.add('is-valid');
            feedbackElement.textContent = mensaje || 'Looks good!';
        } else {
            campo.classList.remove('is-valid');
            campo.classList.add('is-invalid');
            feedbackElement.textContent = mensaje || 'Valor no válido';
        }
    }

    document.getElementById('rfc').addEventListener('blur', function() {
        validarCampo('rfc', this.value.length >= 12 && this.value.length <= 13, 'El RFC debe tener 12 o 13 caracteres.');
    });

    document.getElementById('cp').addEventListener('blur', function() {
        validarCampo('cp', this.value.length === 5 && /^\d+$/.test(this.value), 'El Código Postal debe tener 5 dígitos.');
    });

    var camposTelefono = ['telefono_fijo', 'celular', 'telefono_ref'];
    camposTelefono.forEach(function(campo) {
        document.getElementById(campo).addEventListener('blur', function() {
            validarCampo(campo, this.value.length === 10 && /^\d+$/.test(this.value), 'Debe contener 10 dígitos.');
        });
    });

    document.getElementById('correo').addEventListener('blur', function() {
        var regexCorreo = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        validarCampo('correo', regexCorreo.test(this.value), 'Debe ingresar un correo electrónico válido.');
    });

  
    var camposTexto = ['nombre_lp', 'giro', 'calle', 'referencia', 'nombre_col', 'nombre_ciudad', 'nombre_edo', 'nombre_mun', 'nombre_depto', 'nombre', 'ape_pat', 'ape_mat', 'titulo', 'cargo'];
    camposTexto.forEach(function(campo) {
        document.getElementById(campo).addEventListener('blur', function() {
            validarCampo(campo, /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ. ]+$/.test(this.value), 'Solo se permiten letras.');
        });
    });

});
</script>




@endsection
