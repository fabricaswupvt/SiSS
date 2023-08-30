@extends('layout.template')

@section('title', 'Datos Lugar de Presentacion')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
  <h2 class="text-center mb-5">Datos de lugar de prestación</h2>
    <form class="row g-3">
      <label class="form-label mb-1" style="font-weight: bold;">Información de lugar de prestación</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">RFC</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre de lugar de prestación</label>
              <input type="text" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Sector</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Tipo</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Giro</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <label class="form-label mb-1" style="font-weight: bold;">Información de Dirección:</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">Calle</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Exterior</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Nº Interior</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Referencia para llegar</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Colonia</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Código postal</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Ciudad</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Municipio</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Estado</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">País</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </div>
          <label class="form-label mb-1" style="font-weight: bold;">Información del responsable del lugar de prestación:</label>
          <div class="row">
            <div class="col-md-4">
              <label class="form-label">Nombre del departamento</label>
              <select class="form-select" aria-label="Default select example">
                <option selected>Selecciona una opción</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nombre del responsable</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido materno</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Apellido paterno</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Título</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Cargo</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
          </div>
        <label class="form-label mb-1" style="font-weight: bold;">Contacto con responsable:</label>
        <div class="row">
            <div class="col-md-4">
              <label class="form-label">Teléfono fijo</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono celular</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label class="form-label">Teléfono de referencia</label>
              <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-4">
              <label for="exampleFormControlInput1" class="form-label">Correo</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@mail.com">
            </div>
        </div> 
        <div class="d-flex justify-content-center">
          <button type="button" class="btn btn-success col-md-2 mx-2">Guardar</button>
          <button type="button" class="btn btn-success col-md-2 mx-2">Cancelar</button>
        </div>
        <div>
          
        </div>
      </form>


  </div>
</div>
@endsection
