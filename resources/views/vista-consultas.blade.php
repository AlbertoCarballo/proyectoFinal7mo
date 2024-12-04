@extends('navbar')

@section('content')

<!--seccion consultas-->
<div class="mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Historial de Consultas</h2>

    <!-- Filtros -->
    <div class="mb-4">
        <label for="estatusFilter" class="form-label">Filtrar por Estatus:</label>
        <select id="estatusFilter" class="form-select" onchange="filtrar()">
            <option value="">Todos</option>
            <option value="Completado">Completado</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Cancelado">Cancelado</option>
        </select>

        <label for="especialidadFilter" class="form-label">Filtrar por Especialidad:</label>
        <select id="especialidadFilter" class="form-select" onchange="filtrar()">
            <option value="">Todas</option>
            <option value="Cardiología">Cardiología</option>
            <option value="Dermatología">Dermatología</option>
            <option value="Neurología">Neurología</option>
            <option value="Oftalmología">Oftalmología</option>
        </select>
    </div>

    <div style="max-height: 400px; overflow-y: auto;">
        <table class="table table-striped table-bordered" id="consultaTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID de Cita Médica</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Paciente (Nombre Completo)</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Breve Descripción</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Consultorio</th>
                    <th scope="col">Nombre del Doctor</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CIT001</td>
                    <td>2024-11-28 10:00 AM</td>
                    <td>Juan Pérez Gómez</td>
                    <td>123-456-7890</td>
                    <td>juan.perez@email.com</td>
                    <td>Dolor abdominal persistente.</td>
                    <td>Cardiología</td>
                    <td>Consultorio 3</td>
                    <td>Dr. Juan Pérez</td>
                    <td class="text-success fw-bold">Completado</td>
                </tr>
                <tr>
                    <td>CIT002</td>
                    <td>2024-11-29 02:00 PM</td>
                    <td>María López García</td>
                    <td>987-654-3210</td>
                    <td>maria.lopez@email.com</td>
                    <td>Chequeo general anual.</td>
                    <td>Dermatología</td>
                    <td>Consultorio 5</td>
                    <td>Dra. María López</td>
                    <td class="text-warning fw-bold">Pendiente</td>
                </tr>
                <tr>
                    <td>CIT003</td>
                    <td>2024-12-01 08:30 AM</td>
                    <td>Carlos Gómez Sánchez</td>
                    <td>456-789-0123</td>
                    <td>carlos.gomez@email.com</td>
                    <td>Revisión de presión arterial.</td>
                    <td>Neurología</td>
                    <td>Consultorio 1</td>
                    <td>Dr. Carlos Gómez</td>
                    <td class="text-danger fw-bold">Cancelado</td>
                </tr>
                <tr>
                    <td>CIT004</td>
                    <td>2024-12-02 11:00 AM</td>
                    <td>Laura Martínez Díaz</td>
                    <td>321-654-9870</td>
                    <td>laura.martinez@email.com</td>
                    <td>Dolor de cabeza constante.</td>
                    <td>Neurología</td>
                    <td>Consultorio 2</td>
                    <td>Dr. Luis Fernández</td>
                    <td class="text-warning fw-bold">Pendiente</td>
                </tr>
                <tr>
                    <td>CIT005</td>
                    <td>2024-12-02 03:00 PM</td>
                    <td>Pedro Ruiz Sánchez</td>
                    <td>789-123-4560</td>
                    <td>pedro.ruiz@email.com</td>
                    <td>Chequeo anual.</td>
                    <td>Cardiología</td>
                    <td>Consultorio 6</td>
                    <td>Dr. Juan Pérez</td>
                    <td class="text-success fw-bold">Completado</td>
                </tr>
                <tr>
                    <td>CIT006</td>
                    <td>2024-12-03 09:00 AM</td>
                    <td>Ana Rodríguez Pérez</td>
                    <td>234-567-8901</td>
                    <td>ana.rodriguez@email.com</td>
                    <td>Revisión de ojos.</td>
                    <td>Oftalmología</td>
                    <td>Consultorio 4</td>
                    <td>Dr. Patricia López</td>
                    <td class="text-success fw-bold">Completado</td>
                </tr>
                <tr>
                    <td>CIT007</td>
                    <td>2024-12-03 10:30 AM</td>
                    <td>Lucía Sánchez Hernández</td>
                    <td>567-890-1234</td>
                    <td>lucia.sanchez@email.com</td>
                    <td>Consulta de piel.</td>
                    <td>Dermatología</td>
                    <td>Consultorio 7</td>
                    <td>Dra. María López</td>
                    <td class="text-danger fw-bold">Cancelado</td>
                </tr>
                <tr>
                    <td>CIT008</td>
                    <td>2024-12-04 12:00 PM</td>
                    <td>Mario García Pérez</td>
                    <td>678-901-2345</td>
                    <td>mario.garcia@email.com</td>
                    <td>Examen de colesterol.</td>
                    <td>Cardiología</td>
                    <td>Consultorio 3</td>
                    <td>Dr. Juan Pérez</td>
                    <td class="text-success fw-bold">Completado</td>
                </tr>
                <tr>
                    <td>CIT009</td>
                    <td>2024-12-04 03:00 PM</td>
                    <td>Fernando González Martínez</td>
                    <td>234-678-9012</td>
                    <td>fernando.gonzalez@email.com</td>
                    <td>Chequeo general.</td>
                    <td>Dermatología</td>
                    <td>Consultorio 6</td>
                    <td>Dra. María López</td>
                    <td class="text-warning fw-bold">Pendiente</td>
                </tr>
                <tr>
                    <td>CIT010</td>
                    <td>2024-12-05 08:30 AM</td>
                    <td>Elsa Martín Ruiz</td>
                    <td>890-234-5678</td>
                    <td>elsa.martin@email.com</td>
                    <td>Chequeo general anual.</td>
                    <td>Neurología</td>
                    <td>Consultorio 5</td>
                    <td>Dr. Carlos Gómez</td>
                    <td class="text-danger fw-bold">Cancelado</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!--filtrados js-->
<script>
    function filtrar() {
        let estatus = document.getElementById("estatusFilter").value.toLowerCase();
        let especialidad = document.getElementById("especialidadFilter").value.toLowerCase();
        let rows = document.getElementById("consultaTable").getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let row = rows[i];
            let estatusCell = row.cells[9].innerText.toLowerCase();
            let especialidadCell = row.cells[6].innerText.toLowerCase();

            if ((estatus == "" || estatusCell.includes(estatus)) &&
                (especialidad == "" || especialidadCell.includes(especialidad))) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
    }
</script>

@endsection