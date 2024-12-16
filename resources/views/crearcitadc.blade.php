@extends('navbar')

<link rel="stylesheet" href="{{ secure_asset('/assets/style.css') }}">

@section('content')
<div class="container">
    <div class="text-center mt-5">
        <h1 class="text-center mb-4" style="color: #00254d;">Crear Cita Médica</h1>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="appointmentForm" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paciente">Paciente *</label>
                                            <select id="paciente" name="id_paciente" class="form-control" required="required">
                                                <option value="">Seleccionar paciente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha *</label>
                                            <input id="fecha" type="date" name="fecha_cita" class="form-control" required="required" value="{{ date('Y-m-d') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horario">Horario *</label>
                                            <input id="horario" type="time" name="hora_consulta" class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Breve Descripción</label>
                                            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Especifique sus síntomas." rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consultorio">Consultorio *</label>
                                            <label id="consultorioLabel" class="form-control"></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estado">Estado *</label>
                                            <select id="estado" name="estado" class="form-control" required="required">
                                                <option value="">Seleccionar estado</option>
                                                <option value="pendiente">Pendiente</option>
                                                <option value="confirmada">Confirmada</option>
                                                <option value="cancelada">Cancelada</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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

<script> 
    document.addEventListener("DOMContentLoaded", function () {
    const inputDescripcion = document.getElementById("descripcion");

    inputDescripcion.addEventListener("input", function () {
        const regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]*$/;
        if (!regex.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s.,"]/g, '').slice(0, 280);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const doctorId = localStorage.getItem('doctor_id');
        if (!doctorId) {
            Swal.fire({
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false,
                        icon: 'error',
                        title: '¡Error!',
                        text: 'No ha iniciado sesion. Por favor, inicie sesion para acceder a esta pagina.',
                        confirmButtonText: 'Aceptar',
                    }).then(() => {
                        window.location.href = '/';
                        return;
                    }) ;      
        }
        fetch('/api/ver-pacientes')
            .then(response => response.json())
            .then(data => {
                const pacienteSelect = document.getElementById('paciente');
                
                data.data.forEach(paciente => { 
                    const option = document.createElement('option');
                    option.value = paciente.id_paciente; 
                    option.textContent = `${paciente.nombre} ${paciente.primer_apellido} ${paciente.segundo_apellido}`;
                    pacienteSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error al cargar los pacientes:', error);
            });

        const consultorio = localStorage.getItem('consultorio');
        if (consultorio) {
            document.getElementById('consultorioLabel').textContent = consultorio;
        }
    });

document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const descripcion = document.getElementById('descripcion').value.trim();
    const descripcionRegex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s.,0-9"]{0,280}$/;

    if (!descripcionRegex.test(descripcion)) {
        alert('La descripción contiene caracteres no permitidos o supera los 280 caracteres.');
        return;
    }

    var formData = new FormData(document.getElementById('appointmentForm'));

    const idDoctor = localStorage.getItem('doctor_id');
    const nombreDoctor = localStorage.getItem('nombre_completo');
    const consultorio = localStorage.getItem('consultorio');

    const pacienteSelect = document.getElementById('paciente');
    const idPaciente = pacienteSelect.value;
    const nombrePaciente = pacienteSelect.options[pacienteSelect.selectedIndex].text;  


    if (idDoctor && nombreDoctor && consultorio && idPaciente && nombrePaciente) {
        formData.set('id_paciente', idPaciente);  
        formData.set('nombre_paciente', nombrePaciente);  
        formData.set('id_doctor', idDoctor);  
        formData.set('nombre_doctor', nombreDoctor);
        formData.set('consultorio', consultorio);  
        formData.set('descripcion_problema', descripcion);  
    } else {
        alert('No se encontraron datos del doctor, consultorio o paciente.');
        return;
    }

    fetch('/api/crear-cita', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 200) {
            window.location.href = '/mis-citas';
        } else {
            console.error('Errores de validación:', data.error);
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en el servidor.');
    });
});
</script>
<!-- @endsection -->
