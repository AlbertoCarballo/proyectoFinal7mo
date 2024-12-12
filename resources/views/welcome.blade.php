<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/loginblade.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex"></div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                        <form id="loginForm">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInputEmail" name="correo_electronico" placeholder="name@example.com" required>
                                <label for="floatingInputEmail">Correo Electrónico</label>
                            </div>
                            <hr>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="contrasena" placeholder="Password" required>
                                <label for="floatingPassword">Contraseña</label>
                            </div>
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Login</button>
                            </div>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            const correoElectronico = document.getElementById('floatingInputEmail').value;
            const contrasena = document.getElementById('floatingPassword').value;

            try {
                const response = await fetch('/api/auth', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        correo_electronico: correoElectronico,
                        contrasena: contrasena
                    })
                });

                const data = await response.json();

                if (response.ok && data.status === 200) {
                    localStorage.setItem('correo_electronico', correoElectronico);
                    window.location.href = '/home';
                } else {
                    Swal.fire({
                        confirmButtonText: 'Aceptar',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false,
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Las credenciales no coinciden.',
                        confirmButtonText: 'Intentar nuevamente'
                    });
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error del servidor',
                    text: 'Hubo un problema con el servidor. Por favor, intenta más tarde.',
                    confirmButtonText: 'Entendido'
                });
            }
        });
    </script>
</body>

</html>