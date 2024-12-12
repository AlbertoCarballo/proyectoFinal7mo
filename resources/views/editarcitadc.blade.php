@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/style.css') }}">
@section('content')
<div class="container">
    <div class="text-center mt-5">
        <h1 class="text-center mb-4" style="color: #00254d;">Editar Cita Médica</h1>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="appointmentForm" role="form">
                            <div class="controls">

                                <!-- Fila de Nombre -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre *</label>
                                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre *" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Fecha -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha *</label>
                                            <input id="fecha" type="date" name="fecha" class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Horario -->
                                <div class="row">
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
                                            <label id="doctorLabel" class="form-control"></label> <!-- Aquí se mostrará el nombre del doctor -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Descripción -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Breve Descripción</label>
                                            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Especifique sus sintomas." rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Consultorio -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="consultorio">Consultorio *</label>
                                            <label id="consultorioLabel" class="form-control"></label> <!-- Aquí se mostrará el número del consultorio -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Estado -->
                                <div class="row">
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

                                <!-- Botón de guardar -->
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary btn-send pt-2 btn-block">Guardar cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script> 
    document.addEventListener("DOMContentLoaded", function () {
    const inputPacienteNombre = document.getElementById("nombre");
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
    
    inputPacienteNombre.addEventListener("input", function () {
        const regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]*$/;
        if (!regex.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]/g, '');
        }
    });
    const inputDescripcion = document.getElementById("descripcion");

    inputDescripcion.addEventListener("input", function () {
        const regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s]*$/;
        if (!regex.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s.,"]/g, '').slice(0, 280);
        }
    });
});
</script>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    // Obtener la parte final de la URL (el ID de la cita)
    let url = window.location.pathname;
    let citaId = url.substring(url.lastIndexOf('/') + 1);

    // Hacer una solicitud GET utilizando el ID para obtener los datos actuales de la cita
    let apiUrl = `/api/ver-una-cita/${citaId}`;
    
    // Realizar la solicitud GET
    fetch(apiUrl)
        .then(response => response.json())  // Convertir la respuesta a JSON
        .then(data => {
            // Aquí puedes trabajar con los datos recibidos
            console.log("Datos de la cita:", data.data);

            // Asignar los valores recibidos a los campos del formulario
            document.getElementById('nombre').value = data.data.nombre_paciente;
            document.getElementById('fecha').value = data.data.fecha_cita || ''; // Asegurarse que sea una fecha válida
            document.getElementById('horario').value = data.data.hora_consulta || ''; // Asegurarse que sea una hora válida
            document.getElementById('doctorLabel').textContent = data.data.nombre_doctor || 'No asignado'; // Mostrar el nombre del doctor
            document.getElementById('descripcion').value = data.data.descripcion_problema || '';
            document.getElementById('consultorioLabel').textContent = data.data.consultorio || 'No asignado'; // Mostrar el consultorio
            document.getElementById('estado').value = data.data.estado; // Mostrar el estado

            // Almacenar el id_paciente y id_doctor de los datos recibidos para la actualización
            const idPaciente = data.data.id_paciente;
            const idDoctor = data.data.id_doctor;

            // Manejar el envío del formulario
            document.getElementById('appointmentForm').addEventListener('submit', function (e) {
                e.preventDefault();  // Prevenir el comportamiento por defecto del formulario

                // Recoger los datos del formulario, ahora usando los id_paciente y id_doctor de la respuesta GET
                const data = {
                    id_paciente: idPaciente,  // Ahora se usa el id_paciente de la respuesta
                    nombre_paciente: document.getElementById('nombre').value,
                    id_doctor: idDoctor,  // Ahora se usa el id_doctor de la respuesta
                    nombre_doctor: document.getElementById('doctorLabel').textContent,
                    fecha_cita: document.getElementById('fecha').value,
                    hora_consulta: document.getElementById('horario').value,
                    descripcion_problema: document.getElementById('descripcion').value,
                    consultorio: document.getElementById('consultorioLabel').textContent,
                    estado: document.getElementById('estado').value,
                };

                // Realizar la solicitud PUT
                fetch(`/api/actualizar-cita/${citaId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json', // Especificamos que estamos enviando JSON
                    },
                    body: JSON.stringify(data), // Convertimos los datos en formato JSON
                })
                .then(response => response.json())
                .then(data => {
                    // Aquí puedes mostrar un mensaje de éxito o redirigir
                    if (data.status === 200) {
                        alert('Cita actualizada correctamente');
                        console.log(data);  // Puedes usarlo para mostrar el resultado
                    } else {
                        alert('Error al actualizar la cita: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error al actualizar la cita:', error);
                    alert('Hubo un error al actualizar la cita');
                });
            });
        })
        .catch(error => {
            console.error('Error al obtener los datos de la cita:', error);
        });
});


</script>

@endsection
