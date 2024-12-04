@extends ('navbar')
<link rel="stylesheet" href="{{ asset('/assets/resumen.css') }}">
@section('content')
<div class="container">
    <h1 class="text-center">Resumen Clínico</h1>

    <!-- Información General -->
    <div class="mb-3">
        <label for="consultaId" class="form-label">ID de Consulta Médica:</label>
        <input type="text" class="form-control" id="consultaId" disabled value="12345">
    </div>
    <div class="mb-3">
        <label for="pacienteNombre" class="form-label">Nombre del Paciente:</label>
        <input type="text" class="form-control" id="pacienteNombre" disabled value="Juan Pérez González">
    </div>
    <div class="mb-3">
        <label for="fechaHora" class="form-label">Fecha y Hora:</label>
        <input type="text" class="form-control" id="fechaHora" disabled value="2024-12-03 14:30">
    </div>

    <!-- Cuadro de resumen clínico -->
    <div class="summary-box">
        <h5>Resumen Clínico:</h5>
        <textarea class="form-control" rows="5" id="resumenClinico" placeholder="Escribe el resumen clínico aquí..."></textarea>
    </div>

    <!-- Información del doctor -->
    <div class="mb-3">
        <label for="doctorNombre" class="form-label">Nombre del Doctor:</label>
        <input type="text" class="form-control" id="doctorNombre" disabled value="Dr. Luis Rodríguez">
    </div>
    <div class="mb-3">
        <label for="doctorId" class="form-label">ID del Doctor:</label>
        <input type="text" class="form-control" id="doctorId" disabled value="D123">
    </div>

    <!-- Botón de guardar -->
    <button type="button" class="btn btn-save">Guardar</button>
</div>
@endsection