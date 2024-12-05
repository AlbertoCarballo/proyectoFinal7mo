<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/loginblade.css') }}">
</head>

<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-img-left d-none d-md-flex">
                        </div>
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                            <form action="{{ url('/api/auth') }}" method="POST" id="loginForm">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInputEmail" name="correo_electronico" placeholder="name@example.com" required>
                                    <label for="floatingInputEmail">Correo Electronico</label>
                                </div>

                                <hr>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingPassword" name="contrasena" placeholder="Password" required>
                                    <label for="floatingPassword">Contraseña</label>
                                </div>

                                <div class="d-grid mb-2">
                                    <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Login</button>
                                </div>

                                <a class="d-block text-center mt-2 small" href="#">No tienes una cuenta? Registrate</a>

                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>

        <script>
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const correo = document.getElementById('floatingInputEmail').value;

                localStorage.setItem('correo_electronico', correo);

                this.submit();
            });
        </script>

    </body>
</body>

</html>