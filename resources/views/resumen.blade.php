@extends ('navbar')
<link rel="stylesheet" href="{{ secure_asset('/assets/resumen.css') }}">
@section('content')
<div class="container">
    <h1 class="text-center">Resumen Clínico</h1>
    <div class="mb-3">
        <label for="consultaId" class="form-label">ID de Consulta Médica:</label>
        <input type="text" class="form-control" id="consultaId" disabled>
    </div>
    <div class="mb-3">
        <label for="pacienteNombre" class="form-label">Nombre del Paciente:</label>
        <input type="text" class="form-control" id="pacienteNombre" disabled>
    </div>
    <div class="mb-3">
        <label for="fechaHora" class="form-label">Fecha y Hora:</label>
        <input type="text" class="form-control" id="fechaHora" disabled>
    </div>

    <div class="summary-box">
        <h5>Resumen Clínico:</h5>
        <textarea class="form-control" rows="5" id="resumenClinico" placeholder="Escribe el resumen clínico aquí..."></textarea>
    </div>

    <div class="mb-3">
        <label for="doctorNombre" class="form-label">Nombre del Doctor:</label>
        <input type="text" class="form-control" id="doctorNombre" disabled>
    </div>
    <div class="mb-3">
        <label for="doctorId" class="form-label">ID del Doctor:</label>
        <input type="text" class="form-control" id="doctorId" disabled>
    </div>

    <button type="button" class="btn btn-save" id="guardarResumen">Guardar</button>
</div>
<script> 
    document.addEventListener("DOMContentLoaded", function () {
    const inputDescripcion = document.getElementById("resumenClinico");
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

    inputDescripcion.addEventListener("input", function () {
        const regex = /^[a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s.,"0-9]*$/;
        if (!regex.test(this.value)) {
            this.value = this.value.replace(/[^a-zA-ZáéíóúüÁÉÍÓÚÜñÑ\s.,"0-9]/g, '').slice(0, 280);
        }
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let url = window.location.pathname;
        let citaId = url.substring(url.lastIndexOf('/') + 1);

        let apiUrl = `/api/ver-una-cita/${citaId}`;
        
        fetch(apiUrl)
            .then(response => response.json())  
            .then(data => {
                document.getElementById('consultaId').value = data.data.id_consultas;
                document.getElementById('pacienteNombre').value = data.data.nombre_paciente || ''; 
                document.getElementById('fechaHora').value = `${data.data.fecha_cita || ''} ${data.data.hora_consulta || ''}`;
                document.getElementById('doctorNombre').value = data.data.nombre_doctor || 'No asignado'; 
                document.getElementById('doctorId').value = data.data.id_doctor || '';
            })
            .catch(error => {
                console.error('Error al obtener los datos de la cita:', error);
            });

        document.getElementById('guardarResumen').addEventListener('click', function () {
            const idConsultaMedica = document.getElementById('consultaId').value;
            const nombrePaciente = document.getElementById('pacienteNombre').value;
            const idDoctor = document.getElementById('doctorId').value;
            const nombreDoctor = document.getElementById('doctorNombre').value;
            const fechaConsulta = document.getElementById('fechaHora').value;
            const resumenConsulta = document.getElementById('resumenClinico').value;

            const postData = {
                id_consulta_medica: idConsultaMedica,
                nombre_paciente: nombrePaciente,
                id_doctor: idDoctor,
                nombre_doctor: nombreDoctor,
                fecha_consulta: fechaConsulta,
                resumen_consulta: resumenConsulta
            };

            // Validar campos requeridos
            if (!postData.id_consulta_medica || !postData.nombre_paciente || !postData.id_doctor || !postData.nombre_doctor || !postData.resumen_consulta) {
                alert('Todos los campos requeridos deben estar completos.');
                return;
            }

            fetch('/api/crear-resumen', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(postData)
            })
            .then(response => response.json())
            .then(data => {
                alert('Datos guardados exitosamente.');
                console.log('Respuesta del servidor:', data);
                window.location.href = '/historial-resumen';
            })
            .catch(error => {
                console.error('Error al guardar los datos:', error);
                alert('Ocurrió un error al guardar los datos.');
            });
        });
    });
</script>
@endsection
