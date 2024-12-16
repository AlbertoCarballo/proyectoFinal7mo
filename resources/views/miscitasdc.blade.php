@extends('navbar')

<link rel="stylesheet" href="{{ secure_asset('/assets/miscitastabla.css') }}">

@section('content')
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Citas Médicas</h2>

    <div class="text-center mb-4">
        <a class="btn btn-primary btn-lg" href="crear-cita" style="border-radius: 30px; padding: 10px 40px;">
            <i class="fas fa-calendar-plus me-2"></i> Programar Cita
        </a>
    </div>

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
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

        const apiUrl = `/api/ver-mis-citas/${doctorId}`;

        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener las citas');
                }
                return response.json();
            })
            .then(data => {
                console.log('Datos de las citas:', data);

                if (data.status !== 200 || !data.data || data.data.length === 0) {
                    alert('No se encontraron citas médicas.');
                    return;
                }

                const tableBody = document.querySelector("table tbody");

                tableBody.innerHTML = '';

                data.data.forEach(cita => {
                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${cita.id_consultas}</td>
                        <td>${cita.nombre_paciente}</td>
                        <td>${cita.fecha_cita} ${cita.hora_consulta}</td>
                        <td>${cita.descripcion_problema || 'Sin descripción'}</td>
                        <td>${cita.estado}</td>
                        <td>${cita.consultorio || 'N/A'}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="resumen/${cita.id_consultas}" title="Agregar Resumen">
                                <i class="fas fa-file-alt"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" href="editar-cita/${cita.id_consultas}" title="Editar Cita">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="eliminarCita(${cita.id_consultas})" title="Eliminar Cita">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    `;

                    const statusCell = row.querySelector('td:nth-child(5)');
                    if (statusCell) {
                        switch (statusCell.textContent.trim().toLowerCase()) {
                            case "espera":
                                statusCell.style.color = "orange";
                                break;
                            case "cancelado":
                                statusCell.style.color = "red";
                                break;
                            case "completado":
                                statusCell.style.color = "green";
                                break;
                            default:
                                break;
                        }
                    }

                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error al obtener las citas:', error);
                alert('No se pudieron cargar las citas médicas.');
            });
    });

    function eliminarCita(citaId) {
        if (confirm('¿Estás seguro de eliminar esta cita?')) {
            const apiUrl = `/api/borrar-cita/${citaId}`;

            fetch(apiUrl, {
                method: 'DELETE',  
                headers: {
                    'Content-Type': 'application/json',  
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al eliminar la cita');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 200) {
                    alert('Cita eliminada correctamente');
                    location.reload();  
                } else {
                    alert('Error al eliminar la cita: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error al eliminar la cita:', error);
                alert('Hubo un error al eliminar la cita');
            });
        }
    }
</script>

@endsection