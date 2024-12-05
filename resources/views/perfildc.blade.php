@extends('navbar')
<link rel="stylesheet" href="{{ asset('/assets/identificacion.css') }}">
@section('content')
<div class="container mt-5">
    <!-- Identificación del Doctor -->
    <h2 class="text-center mb-4" style="color: #00254d;">Identificación del Doctor</h2>
    <div class="card">
        <div class="card-title" id="doctor-name"></div>
        <div class="row g-0">
            <!-- Imagen del Doctor -->
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="https://img.freepik.com/foto-gratis/hombre-mediano-que-trabaja-como-enfermera_23-2151061667.jpg?t=st=1733287631~exp=1733291231~hmac=f18054176bcd21f32cbd5bcc9a86418d9fd5438efe1131d690164fbd38d67fe7&w=360" 
                     alt="Foto del Doctor" class="img-fluid">
            </div>
            <!-- Datos del Doctor -->
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Especialidad:</label>
                            <p class="form-control-plaintext" id="doctor-specialty">Cargando...</p>

                            <label class="form-label">Consultorio:</label>
                            <p class="form-control-plaintext" id="doctor-office">Cargando...</p>

                            <label class="form-label">Correo Electrónico:</label>
                            <p class="form-control-plaintext" id="doctor-email">Cargando...</p>
                        </div>
                        <div class="col">
                            <label class="form-label">Cédula Profesional:</label>
                            <p class="form-control-plaintext" id="doctor-license">Cargando...</p>

                            <label class="form-label">RFC:</label>
                            <p class="form-control-plaintext" id="doctor-rfc">Cargando...</p>

                            <label class="form-label">Alma Mater:</label>
                            <p class="form-control-plaintext" id="doctor-alma-mater">Cargando...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">Fecha de emisión: {{ now()->format('d/m/Y') }}</div>
    </div>
</div>

<!-- Script para cargar datos dinámicamente -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtener el ID del doctor desde el localStorage
        const doctorId = localStorage.getItem('doctor_id');

        if (!doctorId) {
            alert('No se encontró el ID del doctor. Redirigiendo al login...');
            window.location.href = '/login'; // Redirigir al login si no hay ID
            return;
        }

        // URL de la API para obtener los datos del doctor
        const apiUrl = `http://127.0.0.1:8000/api/ver-un-doctor/${doctorId}`;

        // Petición a la API
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del doctor');
                }
                return response.json();
            })
            .then(data => {
                console.log('Datos del doctor:', data);

                if (data.status !== 200 || !data.data) {
                    alert('No se encontraron datos del doctor.');
                    return;
                }

                const doctor = data.data;

                // Actualizar los campos dinámicos con los datos del doctor
                document.getElementById('doctor-name').textContent = `Dr. ${doctor.nombre} ${doctor.primer_apellido} ${doctor.segundo_apellido || ''}`;
                document.getElementById('doctor-specialty').textContent = doctor.id_especialidad || 'Especialidad no especificada';
                document.getElementById('doctor-office').textContent = doctor.consultorio || 'Sin consultorio asignado';
                document.getElementById('doctor-email').textContent = doctor.correo_electronico || 'Sin correo electrónico';
                document.getElementById('doctor-license').textContent = doctor.cedula_profesional || 'Sin cédula profesional';
                document.getElementById('doctor-rfc').textContent = doctor.rfc || 'Sin RFC';
                document.getElementById('doctor-alma-mater').textContent = doctor.alama_mater || 'Sin información';
            })
            .catch(error => {
                console.error('Error al cargar los datos del doctor:', error);
                alert('No se pudieron cargar los datos del doctor.');
            });
    });
</script>
@endsection
