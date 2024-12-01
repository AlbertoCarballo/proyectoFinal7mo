@extends ('navbardc')

@section('content')
<div class="container mt-5">
    <!-- Perfil del Doctor -->
    <h2 class="text-center mb-4" style="color: #00254d;">Datos del Doctor</h2>
    <div class="row">
        <div class="col-md-4 d-flex justify-content-end">
            <div class="profile-picture">
                <img src="https://via.placeholder.com/350" alt="Foto de perfil" class="img-fluid rounded-3" style="width: 350px; height: 350px; object-fit: cover;">
            </div>
        </div>
        <div class="col-md-8">
            <!-- Datos del doctor -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Nombre</label>
                        <p class="form-control-plaintext">Juan</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Primer apellido</label>
                        <p class="form-control-plaintext">Pérez</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Segundo apellido</label>
                        <p class="form-control-plaintext">Gómez</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Correo Electrónico</label>
                        <p class="form-control-plaintext">juan.perez@doctores.com</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Consultorio</label>
                        <p class="form-control-plaintext">Consultorio 3</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Especialidad</label>
                        <p class="form-control-plaintext">Cardiología</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Cédula Profesional</label>
                        <p class="form-control-plaintext">1234567890</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">RFC</label>
                        <p class="form-control-plaintext">JUAP870101HDFMNS00</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">Alma Mater</label>
                        <p class="form-control-plaintext">Universidad Nacional Autónoma de México (UNAM)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection