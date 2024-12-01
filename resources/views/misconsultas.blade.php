@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/iconos.css') }}">

@section('content')
<div class="text-center">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Historial de Consultas</h1>
        <h2>Nombre del paciente
            <div class="text-right mb-4">
                <i class="fas fa-plus-circle iconos text-success" onclick="crearCita()" style="cursor: pointer;" title="Crear Cita"></i>
            </div>
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID de Cita</th>
                        <th>Horario y Fecha</th>
                        <th>Consultorio</th>
                        <th>Doctor</th>
                        <th>Especialidad</th>
                        <th>Breve Descripción</th>
                        <th>Status</th>
                        <th>Tratamiento</th>
                        <th>Resumen de la Consulta</th>
                        <th>Medicamentos/Tratamientos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CIT001</td>
                        <td>2024-12-01, 10:00 AM</td>
                        <td>Consultorio 3</td>
                        <td>Dr. Juan Pérez</td>
                        <td>Cardiología</td>
                        <td>Dolor en el pecho recurrente.</td>
                        <td><span class="badge bg-success">Completada</span></td>
                        <td>Monitoreo cardiaco durante 24 horas.</td>
                        <td>El paciente mostró signos de recuperación, pero se recomienda seguimiento.</td>
                        <td>Beta bloqueadores y dieta controlada en grasas.</td>
                        <td>

                            <div class="actions">
                                <i class="fas fa-edit iconos text-warning" onclick="editarCita()" style="cursor: pointer;" title="Editar Cita"></i>
                                <i class="fas fa-trash-alt iconos text-danger" onclick="eliminarCita()" style="cursor: pointer;" title="Eliminar Cita"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>CIT002</td>
                        <td>2024-12-02, 02:00 PM</td>
                        <td>Consultorio 5</td>
                        <td>Dra. María López</td>
                        <td>Dermatología</td>
                        <td>Erupción cutánea en brazos.</td>
                        <td><span class="badge bg-warning">Pendiente</span></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
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
    </div>
</div>
@endsection