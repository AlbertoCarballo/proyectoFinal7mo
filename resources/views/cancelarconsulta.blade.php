@extends('navbar')

@section('content')
<!--seccion panel de consultas NO APLICABLE USUARIO NI DOCTOR-->
<div class="container mt-5">
    <h2 class="text-center mb-4" style="color: #00254d;">Cancelar Cita Médica</h2>

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="cancelAppointmentForm" role="form">
                            <div class="controls">
                                <!-- Fila de ID de Cita Médica y Nombre del Paciente -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="citaId">ID de Cita Médica *</label>
                                            <input id="citaId" type="text" name="citaId" class="form-control" placeholder="ID de Cita Médica *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombrePaciente">Nombre del Paciente *</label>
                                            <input id="nombrePaciente" type="text" name="nombrePaciente" class="form-control" placeholder="Nombre Completo del Paciente *" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Contraseña para Confirmación -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="confirmarPassword">Confirmar Contraseña *</label>
                                            <input id="confirmarPassword" type="password" name="confirmarPassword" class="form-control" placeholder="Contraseña para Confirmar *" required="required">
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de Enviar -->
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-danger btn-send pt-2 btn-block">Cancelar Cita</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection