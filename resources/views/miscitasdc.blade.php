@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/miscitastabla.css') }}">

@section('content')
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Citas Médicas</h2>

    <!-- Botón para programar cita -->
    <div class="text-center mb-4">
        <!-- <button class="btn btn-primary btn-lg" onclick="crearCita()" style="border-radius: 30px; padding: 10px 40px;">
            <i class="fas fa-calendar-plus me-2"></i> Programar Cita
        </button> -->
        <a class="btn btn-primary btn-lg" href="crear-cita" style="border-radius: 30px; padding: 10px 40px;">
            <i class="fas fa-calendar-plus me-2"></i> Programar Cita
        </a>
    </div>

    <!-- Tabla de citas médicas -->
    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID de Cita</th>
                    <th scope="col">Nombre del Paciente</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Consultorio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345</td>
                    <td>John Doe</td>
                    <td>2024-11-28 10:00 AM</td>
                    <td>Dolor abdominal persistente.</td>
                    <td>Completado</td>
                    <td>Consultorio 3</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12346</td>
                    <td>Maria López</td>
                    <td>2024-11-29 02:00 PM</td>
                    <td>Chequeo general anual.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 2</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12347</td>
                    <td>José Martínez</td>
                    <td>2024-12-01 08:30 AM</td>
                    <td>Control de hipertensión.</td>
                    <td>Completado</td>
                    <td>Consultorio 5</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12348</td>
                    <td>Ana García</td>
                    <td>2024-12-02 10:00 AM</td>
                    <td>Examen de colesterol y glucosa.</td>
                    <td>Cancelado</td>
                    <td>Consultorio 3</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12349</td>
                    <td>Pedro Rodríguez</td>
                    <td>2024-12-03 11:30 AM</td>
                    <td>Chequeo para deporte.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 4</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12350</td>
                    <td>Lucía Fernández</td>
                    <td>2024-12-04 09:00 AM</td>
                    <td>Consulta de nutrición.</td>
                    <td>Completado</td>
                    <td>Consultorio 1</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12351</td>
                    <td>Fernando Sánchez</td>
                    <td>2024-12-05 03:00 PM</td>
                    <td>Revisión de la vista.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 6</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12352</td>
                    <td>Carlos Peña</td>
                    <td>2024-12-06 04:30 PM</td>
                    <td>Consulta para dolor de espalda.</td>
                    <td>Completado</td>
                    <td>Consultorio 2</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12353</td>
                    <td>Isabel Ruiz</td>
                    <td>2024-12-07 09:30 AM</td>
                    <td>Chequeo para embarazo.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 7</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12354</td>
                    <td>Héctor Jiménez</td>
                    <td>2024-12-08 06:00 PM</td>
                    <td>Consulta de alergias.</td>
                    <td>Cancelado</td>
                    <td>Consultorio 4</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12355</td>
                    <td>Raúl Torres</td>
                    <td>2024-12-09 01:00 PM</td>
                    <td>Examen de salud general.</td>
                    <td>Completado</td>
                    <td>Consultorio 3</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12346</td>
                    <td>Maria López</td>
                    <td>2024-11-29 02:00 PM</td>
                    <td>Chequeo general anual.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 2</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12347</td>
                    <td>José Martínez</td>
                    <td>2024-12-01 08:30 AM</td>
                    <td>Control de hipertensión.</td>
                    <td>Completado</td>
                    <td>Consultorio 5</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12348</td>
                    <td>Ana García</td>
                    <td>2024-12-02 10:00 AM</td>
                    <td>Examen de colesterol y glucosa.</td>
                    <td>Cancelado</td>
                    <td>Consultorio 3</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12349</td>
                    <td>Pedro Rodríguez</td>
                    <td>2024-12-03 11:30 AM</td>
                    <td>Chequeo para deporte.</td>
                    <td>Pendiente</td>
                    <td>Consultorio 4</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>12350</td>
                    <td>Lucía Fernández</td>
                    <td>2024-12-04 09:00 AM</td>
                    <td>Consulta de nutrición.</td>
                    <td>Completado</td>
                    <td>Consultorio 1</td>
                    <td>
                        <button class="btn btn-info btn-sm" onclick="agregarResumen()" title="Agregar Resumen"><i class="fas fa-file-alt"></i></button>
                        <button class="btn btn-warning btn-sm" onclick="editarCita()" title="Editar Cita"><i class="fas fa-pencil-alt"></i></button>
                        <button class="btn btn-danger btn-sm" onclick="eliminarCita()" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Se tuvo que incluir porque eran muchos datos de la tabla -->
<script>
    $(document).ready(function() {
        // Cambiar el color del texto en las celdas que contienen 'Pendiente', 'Cancelado' y 'Completado'
        $("td").each(function() {
            var cellText = $(this).text().trim();

            switch (cellText) {
                case "Pendiente":
                    $(this).css("color", "orange");
                    break;
                case "Cancelado":
                    $(this).css("color", "red");
                    break;
                case "Completado":
                    $(this).css("color", "green");
                    break;
                default:
                    break;
            }
        });
    });
</script>
@endsection