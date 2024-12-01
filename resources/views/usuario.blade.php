@extends('navbar')

@section('content')

<h2 class="text-center mb-4" style="color: #00254d;">Datos del Paciente</h2>
<div class="row">
    <div class="col-md-4 d-flex justify-content-end">
        <div class="profile-picture">
            <img src="https://via.placeholder.com/350" alt="Foto de perfil" class="img-fluid rounded-3" style="width: 350px; height: 350px; object-fit: cover;">
        </div>
    </div>
    <div class="col-md-8">
        <!-- Datos del paciente -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Nombre</label>
                    <p class="form-control-plaintext">John</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Primer apellido</label>
                    <p class="form-control-plaintext">Doe</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Segundo apellido</label>
                    <p class="form-control-plaintext">Prince</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Correo Electrónico</label>
                    <p class="form-control-plaintext">john.doe@example.com</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Número de teléfono</label>
                    <p class="form-control-plaintext">1234567890</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Peso</label>
                    <p class="form-control-plaintext">75</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Estatura</label>
                    <p class="form-control-plaintext">1.78</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Género</label>
                    <p class="form-control-plaintext">Masculino</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Fecha de nacimiento</label>
                    <p class="form-control-plaintext">1990-01-01</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Tipo de sangre</label>
                    <p class="form-control-plaintext">O+</p>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold text-dark">Número de emergencia</label>
                    <p class="form-control-plaintext">1234567890</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Historial -->
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Consultas</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Nombre del Doctor</th>
                <th scope="col">Breve Descripción</th>
                <th scope="col">Consultorio</th>
                <th scope="col">Estatus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2024-11-28 10:00 AM</td>
                <td>Dr. Juan Pérez</td>
                <td>Dolor abdominal persistente.</td>
                <td>Consultorio 3</td>
                <td class="text-success fw-bold">Completado</td>
            </tr>
            <tr>
                <td>2024-11-29 02:00 PM</td>
                <td>Dra. María López</td>
                <td>Chequeo general anual.</td>
                <td>Consultorio 5</td>
                <td class="text-warning fw-bold">Pendiente</td>
            </tr>
            <tr>
                <td>2024-12-01 08:30 AM</td>
                <td>Dr. Carlos Gómez</td>
                <td>Revisión de presión arterial.</td>
                <td>Consultorio 1</td>
                <td class="text-danger fw-bold">Cancelado</td>
            </tr>
        </tbody>
    </table>
</div>
</div>


@endsection