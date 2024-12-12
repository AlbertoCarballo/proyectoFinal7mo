<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Clínica</title>
    <!-- Cargar FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cargar Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Cargar Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('/assets/navbar.css') }}">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="/home">
                    Mi Clínica
                </a>

                <!-- Botón para dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido colapsable -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Usuario (desplegable) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle pe-2"></i> Usuario
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/perfil"><i class="fas fa-user pe-2"></i> Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/mis-citas"><i class="fas fa-history pe-2"></i>Historial Citas</a></li>
                                <li><a class="dropdown-item" href="/historial-resumen"><i class="fas fa-history pe-2"></i>Historial Resumen</a></li>
                            </ul>
                        </li>
                        <!-- Consultas -->
                        <li class="nav-item">
                            <a class="nav-link" href="/vista-consultas">
                                <i class="fas fa-briefcase-medical pe-2"></i> Consultas
                            </a>
                        </li>
                    </ul>

                    <!-- Botón Cerrar sesión -->
                    <div class="d-flex">
                        <button id="logoutButton" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-sign-out-alt pe-2"></i> Cerrar sesión
                        </button>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <!-- Aquí va el contenido específico de cada página -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('logoutButton').addEventListener('click', function () {
        // Revisa si hay datos en localStorage
        if (localStorage.length > 0) {
            // Limpia el localStorage
            localStorage.clear();
        }
        // Redirige a la página de login
        window.location.href = '/';
    });
</script>

</body>

</html>