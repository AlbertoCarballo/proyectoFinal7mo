@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/miscitastabla.css') }}">

@section('content')
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Resumen</h2>
    <!-- Tabla de citas médicas -->
    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID de Cita</th>
                    <th scope="col">Nombre del Paciente</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Descripción</th>
                    
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>12345</td>
                    <td>John Doe</td>
                    <td>2024-11-28 10:00 AM</td>
                    <td>Dolor abdominal persistente.</td>
                    <td>Completado</td>
                    <td>Consultorio 3</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="resumen" title="Agregar Resumen"><i class="fas fa-file-alt"></i></a>
                        <a class="btn btn-warning btn-sm" href="editar-cita" title="Editar Cita"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-danger btn-sm" href="#" title="Eliminar Cita"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr> -->
                
            </tbody>
        </table>
    </div>
</div>



<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Se tuvo que incluir porque eran muchos datos de la tabla -->
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

        const apiUrl = `/api/ver-mis-resumenes/${doctorId}`;

        // Petición a la API
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
                        <td>${cita.id_resumen_consulta}</td>
                        <td>${cita.nombre_paciente}</td>
                        <td>${cita.fecha_consulta}</td>
                        <td>${cita.resumen_consulta || 'Sin descripción'}</td>

                        <td>
                            <a class="btn btn-warning btn-sm" href="editar-resumen/${cita.id_resumen_consulta}" title="Editar Cita">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="eliminarCita(${cita.id_resumen_consulta})" title="Eliminar Cita">
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
            const apiUrl = `/api/borrar-resumen/${citaId}`;

            fetch(apiUrl, {
                method: 'DELETE', // Utilizamos el método DELETE
                headers: {
                    'Content-Type': 'application/json', // Especificamos que estamos enviando JSON
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
                    location.reload(); // Recarga la página para actualizar la tabla
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