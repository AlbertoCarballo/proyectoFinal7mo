@extends ('navbardc')

@section('content')
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Citas Médicas</h2>
    <h4 class="text-center mb-4">Programar Cita
        <div class="text-right mb-4">
            <i class="fas fa-plus-circle iconos text-success" onclick="crearCita()" style="cursor: pointer;" title="Crear Cita"></i>
        </div>
    </h4>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID de Cita</th>
                <th scope="col">Nombre del Paciente</th>
                <th scope="col">Fecha y Hora de Consulta</th>
                <th scope="col">Breve Descripción</th>
                <th scope="col">Estatus</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>12345</td>
                <td>John Doe</td>
                <td>2024-11-28 10:00 AM</td>
                <td>Dolor abdominal persistente.</td>
                <td>
                    <select class="form-select" aria-label="Estatus de la cita">
                        <option value="completado" selected>Completado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </td>
                <td>
                    <div class="actions">
                        <i class="fas fa-edit iconos text-warning" onclick="editarCita()" style="cursor: pointer;" title="Editar Cita"></i>
                        <i class="fas fa-trash-alt iconos text-danger" onclick="eliminarCita()" style="cursor: pointer;" title="Eliminar Cita"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td>12346</td>
                <td>Maria López</td>
                <td>2024-11-29 02:00 PM</td>
                <td>Chequeo general anual.</td>
                <td>
                    <select class="form-select" aria-label="Estatus de la cita">
                        <option value="completado">Completado</option>
                        <option value="pendiente" selected>Pendiente</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </td>
                <td>
                    <div class="actions">
                        <i class="fas fa-edit iconos text-warning" onclick="editarCita()" style="cursor: pointer;" title="Editar Cita"></i>
                        <i class="fas fa-trash-alt iconos text-danger" onclick="eliminarCita()" style="cursor: pointer;" title="Eliminar Cita"></i>
                    </div>
                </td>
            </tr>
            <tr>
                <td>12347</td>
                <td>Carlos Gómez</td>
                <td>2024-12-01 08:30 AM</td>
                <td>Revisión de presión arterial.</td>
                <td>
                    <select class="form-select" aria-label="Estatus de la cita">
                        <option value="completado">Completado</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="cancelado" selected>Cancelado</option>
                    </select>
                </td>
                <td>
                    <div class="actions">
                        <i class="fas fa-edit iconos text-warning" onclick="editarCita()" style="cursor: pointer;" title="Editar Cita"></i>
                        <i class="fas fa-trash-alt iconos text-danger" onclick="eliminarCita()" style="cursor: pointer;" title="Eliminar Cita"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection