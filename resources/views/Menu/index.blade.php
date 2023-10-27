@extends('layout/template')

@section('title', 'Menu de direccionamiento')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Áreas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{url('area/create')}}">Registrar Área</a></li>
            <li><a class="dropdown-item" href="{{url('area')}}">Ver Áreas</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Plantel
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Registrar Plantel</a></li>
            <li><a class="dropdown-item" href="#">Consultar Plantel</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lugar de Prestación
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{url('/FormularioLugarP/create')}}">Registrar Lugar de Prestación</a></li>
            <li><a class="dropdown-item" href="{{url('/FormularioLugarP')}}">Consultar Lugar de Prestación</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="#">Consultar Usuario</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Estadísticas</a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Programa Anual </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li class="dropdown dropend">
                    <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Coordinador</a>
                    <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                        <li><a class="dropdown-item" href="{{url('coordinador/create')}}">Registrar coordinador</a></li>
                        <li><a class="dropdown-item" href="{{url('coordinador')}}">Ver coordinador</a></li>
                    </ul>
                </li>
                <li class="dropdown dropend">
                    <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proyectos ofertados</a>
                    <ul class="dropdown-menu" aria-labelledby="multilevelDropdownMenu1">
                        <li><a class="dropdown-item" href="{{url('proyectos_ofertados/create')}}">Registrar proyecto</a></li>
                        <li><a class="dropdown-item" href="{{url('proyectos_ofertados')}}">Ver proyecto</a></li>
                    </ul>
                </li>
            </ul>
        
          </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-right-from-bracket"></i>Salir</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-light" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
  </div>
</nav>

<script>
   
    let dropdowns = document.querySelectorAll('.dropdown-toggle')
    dropdowns.forEach((dd)=>{
        dd.addEventListener('click', function (e) {
            var el = this.nextElementSibling
            el.style.display = el.style.display==='block'?'none':'block'
        })
    })
</script>

@endsection
