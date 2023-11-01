@extends('layout/template')

@section('title', 'Datos Lugar de Prestación')

@section('content')
<main>
    <div class="container py-4">
        <h2 class="text-center mb-5">Lugar de Prestación</h2>

        <!-- Barra de búsqueda -->
        <div class="input-group mb-3" style="width: 25%;">
            <input type="text" id="search" class="form-control" placeholder="Buscar...">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
        </div>

        <div style="text-align: right; margin-top: 10px; margin-bottom: 10px;">
            <a href="{{ route('FormularioLugarP.create') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-plus"></i> Nuevo Lugar de Prestacion</a>
        </div>

        <!-- Tabla -->
        <div>
        <table class="table table-hover">
            <thead style="background-color: green; color: white;">
                <tr>
                    <th style="border: 1px solid black;">Nombre</th>
                    <th style="border: 1px solid black;">Editar</th>
                    <th style="border: 1px solid black;">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td style="border: 1px solid black;">
                        {{$dato->nombre_lp}}
                    </td>
                    <td style="border: 1px solid black; text-align: center;">
                        <!-- Boton de editar -->
                        <a href="{{ route('formularioLugarPrestacion.edit', ['idlugar_prestacion' => $dato->idlugar_prestacion]) }}" class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
                    <td style="border: 1px solid black; text-align: center;">
                    <form id="deleteForm_{{ $dato->idlugar_prestacion }}" action="{{ route('DatosLugarPrestacion.destroy', $dato->idlugar_prestacion) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Boton de eliminar -->
                        <button data-id="{{ $dato->idlugar_prestacion }}" class="btn btn-danger btn-sm deleteButton"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</main>

<!-- Script para la barra de búsqueda -->
<script>
    const searchInput = document.getElementById("search");
    const rows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();

        rows.forEach(function(row) {
            const nameCell = row.querySelector("td:first-child");

            if (nameCell.textContent.toLowerCase().includes(searchTerm)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });


    
    const style = document.createElement('style');
style.type = 'text/css';
style.innerHTML = `.swal2-button-margin { margin-left: 10px; }`;
document.head.appendChild(style);
    document.addEventListener('DOMContentLoaded', function() {

console.log("Documento cargado");

const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger swal2-button-margin' 
    },
    buttonsStyling: false
});

let deleteButtons = document.querySelectorAll('.deleteButton');
console.log("Número de botones encontrados: " + deleteButtons.length);

deleteButtons.forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Botón de eliminar presionado");

        const formId = 'deleteForm_' + button.getAttribute('data-id');
        console.log("Formulario a enviar: " + formId);

        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'No, Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();  // Envía el formulario correcto basado en el botón que fue clickeado
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'El registro está a salvo.',
                    'error'
                );
            }
        });
    });
});
});

</script>
@endsection



