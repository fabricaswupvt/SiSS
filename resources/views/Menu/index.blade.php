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
            Proyectos ofertados
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Registrar Proyecto</a></li>
            <li><a class="dropdown-item" href="#">Ver Proyecto</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Coordinadores
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Registrar Coordinador</a></li>
            <li><a class="dropdown-item" href="#">Ver Coordinador</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Áreas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Registrar Área</a></li>
            <li><a class="dropdown-item" href="#">Ver Áreas</a></li>
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
            <li><a class="dropdown-item" href="#">Registrar Lugar de Prestación</a></li>
            <li><a class="dropdown-item" href="#">Consultar Lugar de Prestación</a></li>
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

<main>
    <div class="container py-4">
        <h2>Menú de direccionamiento</h2>
        <table style="text-align: left" class="table table-hover">
            <thead>
                <tr>
                    <th>Proyectos ofertados</th>
                    <th>Coordinadores</th>
                    <th>Areas</th>
                </tr>
            </thead>
            <tbody>
                {{--PROYECTOS OFERTADOS--}}
                <td>
                    <li><a href="{{url('proyectos_ofertados/create')}}">Registrar proyecto</a></li>
                    <li><a href="{{url('proyectos_ofertados')}}">Ver Proyectos</a></li>
                </td>
                {{--COORDINADORES--}}
                <td>
                    <li><a href="{{url('coordinador/create')}}">Registrar coordinador</a></li>
                    <li><a href="{{url('coordinador')}}">Ver coordinadores</a></li>
                </td>
                {{--AREAS--}}
                <td>
                    <li><a href="{{url('area/create')}}">Registrar Area</a></li>
                    <li><a href="{{url('area')}}">Ver Areas</a></li>
                </td>
            </tbody>
        </table>

    </div>
</main>

@endsection
