@extends('navbar')
<link rel="stylesheet" href="{{ asset('/assets/identificacion.css') }}">
@section('content')
<div class="container mt-5">
    <!-- identificacion del Doctor -->
    <h2 class="text-center mb-4" style="color: #00254d;">Identificación del Doctor</h2>
    <div class="card">
        <div class="card-title">Dr. Juan Pérez Gómez</div>
        <div class="row g-0">
            <!-- Imagen del Doctor -->
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <img src="https://img.freepik.com/foto-gratis/hombre-mediano-que-trabaja-como-enfermera_23-2151061667.jpg?t=st=1733287631~exp=1733291231~hmac=f18054176bcd21f32cbd5bcc9a86418d9fd5438efe1131d690164fbd38d67fe7&w=360" alt="Foto del Doctor">
            </div>
            <!-- Datos del Doctor -->
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Especialidad:</label>
                            <p class="form-control-plaintext">Cardiología</p>

                            <label class="form-label">Consultorio:</label>
                            <p class="form-control-plaintext">Consultorio 3</p>

                            <label class="form-label">Correo Electrónico:</label>
                            <p class="form-control-plaintext">juan.perez@doctores.com</p>
                        </div>
                        <div class="col">
                            <label class="form-label">Cédula Profesional:</label>
                            <p class="form-control-plaintext">1234567890</p>

                            <label class="form-label">RFC:</label>
                            <p class="form-control-plaintext">JUAP870101HDFMNS00</p>

                            <label class="form-label">Alma Mater:</label>
                            <p class="form-control-plaintext">UNAM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">Fecha de emisión: {{ now()->format('d/m/Y') }}</div>
    </div>
</div>
@endsection