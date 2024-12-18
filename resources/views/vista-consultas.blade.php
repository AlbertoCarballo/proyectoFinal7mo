@extends('navbar')

@section('content')

<!-- Sección de consultas -->
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Consultas</h2>

    <!-- Filtros -->
    <div class="mb-4">
        <label for="estatusFilter" class="form-label">Filtrar por Estatus:</label>
        <select id="estatusFilter" class="form-select" onchange="filtrar()">
            <option value="">Todos</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Cancelada">Cancelado</option>
            <option value="Espera">Espera</option>
            <option value="Confirmada">Confirmada</option>
        </select>
    </div>

    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped table-bordered" id="consultaTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID de Cita Médica</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Breve Descripción</th>
                    <th scope="col">Consultorio</th>
                    <th scope="col">Nombre del Doctor</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody id="consultaTableBody">
                <!-- Aquí se llenarán las filas con JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<script>
    window.onload = function() {
        fetchConsultas();
    };

    function fetchConsultas() {
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
                text: 'No ha iniciado sesión. Por favor, inicie sesión para acceder a esta página.',
            }).then(() => {
                window.location.href = '/';
                return;
            });
        }
        fetch('/api/ver-citas')
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    mostrarConsultas(data.data);
                }
            })
            .catch(error => console.error('Error al obtener las consultas:', error));
    }

    function mostrarConsultas(consultas) {
        let tableBody = document.getElementById('consultaTableBody');
        tableBody.innerHTML = '';

        consultas.forEach(consulta => {
            let row = document.createElement('tr');

            row.innerHTML = `
                <td>${consulta.id_consultas}</td>
                <td>${consulta.fecha_cita} ${consulta.hora_consulta}</td>
                <td>${consulta.nombre_paciente}</td>
                <td>${consulta.descripcion_problema}</td>
                <td>${consulta.consultorio}</td>
                <td>${consulta.nombre_doctor}</td>
                <td class="text-${consulta.estado.toLowerCase() === 'completado' ? 'success' : 'warning'} fw-bold">${consulta.estado}</td>
            `;
            tableBody.appendChild(row);
        });
    }

    function filtrar() {
        let estatus = document.getElementById("estatusFilter").value.toLowerCase();
        let rows = document.getElementById("consultaTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let row = rows[i];
            let estatusCell = row.cells[6] ? row.cells[6].innerText.toLowerCase() : '';

            // Mostrar la fila solo si coincide con el filtro seleccionado o si no hay filtro
            if (estatus === "" || estatusCell.includes(estatus)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
</script>
@endsection
