<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Clínica</title>
    <!-- Cargar FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!--logo-->
                <a class="navbar-brand" href="#">Mi Clínica</a>

                <!-- Botón para dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido colapsable -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!-- Usuario (desplegable) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuario
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Historial</a></li>
                            </ul>
                        </li>
                        <!-- Consultas (desplegable) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Consultas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Crear cita</a></li>
                                <li><a class="dropdown-item" href="#">Visualizar</a></li>
                                <li><a class="dropdown-item" href="#">Cancelar</a></li>
                            </ul>
                        </li>
                        <!-- Especialidades y doctores (desplegable) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Especialidades y Doctores
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Especialidades</a></li>
                                <li><a class="dropdown-item" href="#">Lista de doctores</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Barra de búsqueda -->
                    <form class="d-flex me-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                    <!-- Botones: Sign up y Logout -->
                    <div class="d-flex">
                        <a class="btn btn-sm btn-outline-secondary me-2" href="#">Sign up</a>
                        <a class="btn btn-sm btn-outline-danger" href="#">Cerrar sesión</a>
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

</body>

</html>