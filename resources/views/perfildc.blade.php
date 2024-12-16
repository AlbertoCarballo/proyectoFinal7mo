@extends('navbar')
<link rel="stylesheet" href="{{ secure_asset('/assets/identificacion.css') }}">
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Identificación del Doctor</h2>
    <div class="card">
        <div class="card-title" id="doctor-name"></div>
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="https://img.freepik.com/foto-gratis/hombre-mediano-que-trabaja-como-enfermera_23-2151061667.jpg?t=st=1733287631~exp=1733291231~hmac=f18054176bcd21f32cbd5bcc9a86418d9fd5438efe1131d690164fbd38d67fe7&w=360" 
                     alt="Foto del Doctor" class="img-fluid">
            </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const doctorId = localStorage.getItem('doctor_id');
        if (!doctorId || doctorId.trim() === '') {
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'No ha iniciado sesión. Por favor, inicie sesión para acceder a esta página.',
                confirmButtonText: 'Aceptar',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            }).then(() => {
                window.location.href = '/';
            });
            return;
        }

        const apiDoctorUrl = `/api/ver-un-doctor/${doctorId}`;
        const apiSpecialtiesUrl = `/api/especialidades`;

        fetch(apiDoctorUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del doctor');
                }
                return response.json();
            })
            .then(data => {
                if (data.status !== 200 || !data.data) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Datos no encontrados',
                        text: 'No se encontraron datos del doctor.',
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
                    return;
                }

                const doctor = data.data;

                document.getElementById('doctor-name').textContent = `Dr. ${doctor.nombre || ''} ${doctor.primer_apellido || ''} ${doctor.segundo_apellido || ''}`.trim();
                document.getElementById('doctor-office').textContent = doctor.consultorio || 'Sin consultorio asignado';
                document.getElementById('doctor-email').textContent = doctor.correo_electronico || 'Sin correo electrónico';
                document.getElementById('doctor-license').textContent = doctor.cedula_profesional || 'Sin cédula profesional';
                document.getElementById('doctor-rfc').textContent = doctor.rfc || 'Sin RFC';
                document.getElementById('doctor-alma-mater').textContent = doctor.alama_mater || 'Sin información';

                return fetch(apiSpecialtiesUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error al obtener las especialidades');
                        }
                        return response.json();
                    })
                    .then(specialtyData => {
                        if (specialtyData.status !== "success" || !specialtyData.data) {
                            throw new Error('No se encontraron especialidades.');
                        }

                        const specialties = specialtyData.data;
                        const doctorSpecialty = specialties.find(specialty => specialty.id_especialidad === doctor.id_especialidad);

                        const specialtyName = doctorSpecialty ? doctorSpecialty.nombre_especialidad : 'Especialidad no especificada';
                        document.getElementById('doctor-specialty').textContent = specialtyName;
                    });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudieron cargar los datos.',
                    confirmButtonText: 'Aceptar',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });
            });
    });
</script>

@endsection
