@extends ('navbar')
<link rel="stylesheet" href="{{ secure_asset('/assets/resumen.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    let url = window.location.pathname;
    let citaId = url.substring(url.lastIndexOf('/') + 1);

    let apiUrl = `/api/ver-un-resumen/${citaId}`;
    
    fetch(apiUrl)
        .then(response => response.json())  
        .then(data => {
            document.getElementById('consultaId').value = data.data.id_consulta_medica;
            document.getElementById('pacienteNombre').value = data.data.nombre_paciente || ''; 
            document.getElementById('fechaHora').value = data.data.fecha_consulta;
            document.getElementById('doctorNombre').value = data.data.nombre_doctor || 'No asignado'; 
            document.getElementById('doctorId').value = data.data.id_doctor || '';
            document.getElementById('resumenClinico').value = data.data.resumen_consulta || '';
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

        const putData = {
            id_consulta_medica: idConsultaMedica,
            nombre_paciente: nombrePaciente,
            id_doctor: idDoctor,
            nombre_doctor: nombreDoctor,
            fecha_consulta: fechaConsulta,
            resumen_consulta: resumenConsulta
        };

        if (!putData.id_consulta_medica || !putData.nombre_paciente || !putData.id_doctor || !putData.nombre_doctor || !putData.resumen_consulta) {
            alert('Todos los campos requeridos deben estar completos.');
            return;
        }

        fetch(`/api/actualizar-resumen/${citaId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(putData)
        })
        .then(response => response.json())
        .then(data => {
            alert('Datos actualizados exitosamente.');
            console.log('Respuesta del servidor:', data);
            window.location.href = '/historial-resumen';
        })
        .catch(error => {
            console.error('Error al actualizar los datos:', error);
            alert('Ocurrió un error al actualizar los datos.');
        });
        
    });
});
</script>
@endsection
