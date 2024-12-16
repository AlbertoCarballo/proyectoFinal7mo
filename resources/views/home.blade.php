@extends('navbar')
<link rel="stylesheet" href="{{ secure_asset('/assets/homestyle.css') }}">
@section('content')
<div class="container">
    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide custom-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1551601651-2a8555f1a136?q=80&w=2047&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1579684453401-966b11832744?q=80&w=1791&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1609188076864-c35269136b09?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Imagen 3">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

        <div class="carousel-caption d-none d-md-block text-start custom-caption">
            <h1 class="display-6 fw-bold">Bienvenido a la Clínica Salud y Bienestar</h1>
            <p class="lead fw-bold">Conozca nuestros servicios de atención médica de calidad, diseñados para brindarle la mejor experiencia en salud.</p>
        </div>
    </div>

    <div class="row text-center mb-4 mt-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <img src="https://i.pinimg.com/736x/79/ad/0a/79ad0a1cc208e60c15c612c84aed6295.jpg" alt="Visualizar" class="img-fluid mb-3" style="width: 60px;">
                    <h5 class="card-title font-weight-bold">Visualizar</h5>
                    <ul class="list-unstyled text-muted">
                        <li>Pacientes</li>
                        <li>Consultas</li>
                        <li>Historial médico</li>
                    </ul>
                    <a href="vista-consultas" class="btn btn-primary btn-sm">Ver todos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <img src="https://i.pinimg.com/736x/f6/f6/f2/f6f6f2d8faed6ae3ea849b79f01ac932.jpg" alt="Crear" class="img-fluid mb-3" style="width: 60px;">
                    <h5 class="card-title font-weight-bold">Crear</h5>
                    <ul class="list-unstyled text-muted">
                        <li>Nueva consulta</li>
                        <li>Registrar paciente</li>
                        <li>Servicios adicionales</li>
                    </ul>
                    <a href="crear-cita" class="btn btn-success btn-sm">Ver todos ></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <img src="https://i.pinimg.com/736x/c5/87/e0/c587e0eb0edc492265132579b6754a63.jpg" alt="Editar" class="img-fluid mb-3" style="width: 60px;">
                    <h5 class="card-title font-weight-bold">Editar</h5>
                    <ul class="list-unstyled text-muted">
                        <li>Actualizar datos</li>
                        <li>Editar consultas</li>
                        <li>Eliminar registros</li>
                    </ul>
                    <a href="mis-citas" class="btn btn-warning btn-sm">Ver todos ></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const correo = localStorage.getItem('correo_electronico');

    console.log('Correo encontrado en localStorage:', correo);
    
    if (correo) {
        fetch(`/api/ver-mi-doctor/${correo}`)
            .then(response => response.json())
            .then(data => {
                console.log('Datos del doctor recibidos:', data);
                if (data) {

                    localStorage.setItem('doctor_id', data.id_doctor);
                    console.log('ID del doctor guardado en localStorage:', data.id);

                    const nombreCompleto = `${data.nombre} ${data.primer_apellido}` + 
                        (data.segundo_apellido ? ` ${data.segundo_apellido}` : '');


                    localStorage.setItem('nombre_completo', nombreCompleto);

                    localStorage.setItem('consultorio', data.consultorio);
                } else {
                    console.error('No se encontró el doctor.');
                    alert('No se encontraron datos del doctor.');
                }
            })
            .catch(error => {
                console.error('Error al obtener los datos del doctor:', error);
                alert('No se pudieron cargar los datos del doctor.');
            });
    } else {
        console.error('Correo no encontrado en localStorage');
        alert('No se ha iniciado sesión correctamente. Por favor, inicie sesión.');
        window.location.href = '/';
    }
</script>
@endsection