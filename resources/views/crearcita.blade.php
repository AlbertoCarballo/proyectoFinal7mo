@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/style.css') }}">

@section('content')
<div class="container">
    <div class="text-center mt-5">
        <h1 class="text-center mb-4" style="color: #00254d;">Generar Cita Médica</h1>
    </div>

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="appointmentForm" role="form">
                            <div class="controls">
                                <!-- Fila de Nombre y Apellido -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre *</label>
                                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido">Primer Apellido *</label>
                                            <input id="apellido" type="text" name="apellido" class="form-control" placeholder="Primer Apellido *" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Segundo Apellido y Teléfono -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido2">Segundo Apellido</label>
                                            <input id="apellido2" type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono *</label>
                                            <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Teléfono *" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Correo y Especialidad -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo *</label>
                                            <input id="correo" type="email" name="correo" class="form-control" placeholder="Correo *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad *</label>
                                            <select id="especialidad" name="especialidad" class="form-control" required="required">
                                                <option value="">Seleccionar especialidad</option>
                                                <option value="cardiologia">Cardiología</option>
                                                <option value="dermatologia">Dermatología</option>
                                                <option value="neurologia">Neurología</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Fecha y Horario -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha *</label>
                                            <input id="fecha" type="date" name="fecha" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horario">Horario *</label>
                                            <input id="horario" type="time" name="horario" class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Doctor -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doctor">Doctor *</label>
                                            <select id="doctor" name="doctor" class="form-control" required="required">
                                                <option value="">Seleccionar doctor</option>
                                                <option value="dr_juan_perez">Dr. Juan Pérez</option>
                                                <option value="dr_maria_lopez">Dra. María López</option>
                                                <option value="dr_carlos_gomez">Dr. Carlos Gómez</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Breve Descripción</label>
                                            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Especifique sus sintomas." rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de Enviar -->
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary btn-send pt-2 btn-block">Generar cita</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Mostrar Cita Generada -->
<div class="result-container" id="resultContainer" style="display:none;">
    <h4 class="text-center">Cita Generada</h4>
    <table class="w-100 result-table">
        <tr>
            <th>Id de Cita</th>
            <th>Nombre</th>
            <th>Fecha y Hora</th>
            <th>Doctor</th>
            <th>Especialidad</th>
            <th>Número de Consultorio</th>
        </tr>
        <tr>
            <td id="resultId"></td>
            <td id="resultNombre"></td>
            <td id="resultFechaHora"></td>
            <td id="resultDoctor"></td>
            <td id="resultEspecialidad"></td>
            <td id="resultConsultorio"></td>
        </tr>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('appointmentForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Obtener datos del formulario
        var nombre = document.getElementById('nombre').value;
        var apellido = document.getElementById('apellido').value;
        var apellido2 = document.getElementById('apellido2').value;
        var telefono = document.getElementById('telefono').value;
        var correo = document.getElementById('correo').value;
        var especialidad = document.getElementById('especialidad').value;
        var fecha = document.getElementById('fecha').value;
        var horario = document.getElementById('horario').value;
        var doctor = document.getElementById('doctor').value;

        // Generar un id aleatorio para la cita
        var citaId = 'CIT' + Math.floor(Math.random() * 1000);

        // Asignar los datos a la tabla de resultados
        document.getElementById('resultId').textContent = citaId;
        document.getElementById('resultNombre').textContent = nombre + ' ' + apellido + ' ' + apellido2;
        document.getElementById('resultFechaHora').textContent = fecha + ' ' + horario;
        document.getElementById('resultDoctor').textContent = doctor;
        document.getElementById('resultEspecialidad').textContent = especialidad;
        document.getElementById('resultConsultorio').textContent = 'Consultorio ' + (Math.floor(Math.random() * 10) + 1);

        // Mostrar el resultado y ocultar el formulario
        document.getElementById('resultContainer').style.display = 'block';
        document.getElementById('appointmentForm').reset();
    });
</script>

@endsection