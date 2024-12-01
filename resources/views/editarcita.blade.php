@extends('navbar')

<link rel="stylesheet" href="{{ asset('/assets/style.css') }}">
@section('content')
<div class="container">
    <div class="text-center mt-5">
        <h1 class="text-center mb-4" style="color: #00254d;">Editar Cita Médica</h1>
    </div>

    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="appointmentForm" role="form">
                            <div class="controls">
                                <!-- Fila de Nombre y Apellido -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre *</label>
                                            <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre *" required="required" value="Juan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido">Primer Apellido *</label>
                                            <input id="apellido" type="text" name="apellido" class="form-control" placeholder="Primer Apellido *" required="required" value="Pérez">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Segundo Apellido y Teléfono -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="apellido2">Segundo Apellido</label>
                                            <input id="apellido2" type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido" value="González">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono *</label>
                                            <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Teléfono *" required="required" value="123456789">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Correo y Especialidad -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo">Correo *</label>
                                            <input id="correo" type="email" name="correo" class="form-control" placeholder="Correo *" required="required" value="juan.perez@email.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad *</label>
                                            <select id="especialidad" name="especialidad" class="form-control" required="required">
                                                <option value="">Seleccionar especialidad</option>
                                                <option value="cardiologia" selected>Cardiología</option>
                                                <option value="dermatologia">Dermatología</option>
                                                <option value="neurologia">Neurología</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Fecha y Horario -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fecha">Fecha *</label>
                                            <input id="fecha" type="date" name="fecha" class="form-control" required="required" value="2024-12-01">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="horario">Horario *</label>
                                            <input id="horario" type="time" name="horario" class="form-control" required="required" value="10:00">
                                        </div>
                                    </div>
                                </div>

                                <!-- Fila de Doctor -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doctor">Doctor *</label>
                                            <select id="doctor" name="doctor" class="form-control" required="required">
                                                <option value="">Seleccionar doctor</option>
                                                <option value="dr_juan_perez" selected>Dr. Juan Pérez</option>
                                                <option value="dr_maria_lopez">Dra. María López</option>
                                                <option value="dr_carlos_gomez">Dr. Carlos Gómez</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Breve Descripción</label>
                                            <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Especifique sus sintomas." rows="4">Dolor en el pecho recurrente.</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de guardar-->
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary btn-send pt-2 btn-block">Guardar cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar esto al boton -->
<div class="result-container" id="resultContainer" style="display:none;">
    <h4 class="text-center">Cita Generada</h4>
    <table class="w-100 result-table">
        <tr>
            <th>Id de Cita</th>
            <th>Nombre</th>
            <th>Fecha y Hora</th>
            <th>Doctor</th>
            <th>Especialidad</th>
            <th>Número de Consultorio</th>
        </tr>
        <tr>
            <td id="resultId">CIT001</td>
            <td id="resultNombre">Juan Pérez</td>
            <td id="resultFechaHora">2024-12-01, 10:00 AM</td>
            <td id="resultDoctor">Dr. Juan Pérez</td>
            <td id="resultEspecialidad">Cardiología</td>
            <td id="resultConsultorio">Consultorio 3</td>
        </tr>
    </table>
</div>

@endsection