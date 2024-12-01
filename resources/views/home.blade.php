@extends('navbar')
@section('content')
<div class="container">
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Bienvenido a la Clínica Salud y Bienestar</h1>
            <p class="lead my-3">Conozca nuestros servicios de atención médica de calidad, diseñados para brindarle la mejor experiencia en salud.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Leer más...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Servicios</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Consulta General</a>
                    </h3>
                    <div class="mb-1 text-muted">Ene 15, 2024</div>
                    <p class="card-text mb-auto">Ofrecemos consultas médicas generales para toda la familia. Nuestros profesionales están comprometidos con su bienestar.</p>
                    <a href="#">Leer más</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Imagen de la consulta general" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1937f89346f%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1937f89346f%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.20000076293945%22%20y%3D%22131%22%3EConsulta%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 250px;">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Especialidades</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">Pediatría</a>
                    </h3>
                    <div class="mb-1 text-muted">Ene 10, 2024</div>
                    <p class="card-text mb-auto">Contamos con un equipo especializado en pediatría para el cuidado de los más pequeños.</p>
                    <a href="#">Leer más</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Imagen de pediatría" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1937f893472%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1937f893472%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.20000076293945%22%20y%3D%22131%22%3EPediatría%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 200px; height: 250px;">
            </div>
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Últimas Noticias
                </h3>

                <div class="blog-post">
                    <h2 class="blog-post-title">Nuevo servicio de urgencias</h2>
                    <p class="blog-post-meta">Enero 1, 2024 por <a href="#">Dr. Gómez</a></p>

                    <p>Hemos habilitado un nuevo servicio de urgencias 24/7 para ofrecer atención inmediata en cualquier emergencia.</p>
                    <hr>
                    <p>Además de nuestras consultas regulares, nuestros profesionales están listos para atenderle en situaciones críticas. Estamos aquí para usted en todo momento.</p>
                    <blockquote>
                        <p>Recuerde que en situaciones de emergencia, lo más importante es mantener la calma y dirigirse rápidamente a nuestra clínica.</p>
                    </blockquote>
                    <p>Visítenos en cualquier momento, estamos para cuidar de su salud.</p>
                </div><!-- /.blog-post -->

                <div class="blog-post">
                    <h2 class="blog-post-title">Nuestra campaña de vacunación 2024</h2>
                    <p class="blog-post-meta">Diciembre 23, 2023 por <a href="#">Dra. López</a></p>

                    <p>Este año lanzamos nuestra campaña de vacunación para niños y adultos. No deje pasar esta oportunidad para protegerse contra enfermedades comunes.</p>
                    <p>Las vacunas estarán disponibles hasta finales de febrero. ¡Protéjase hoy!</p>
                </div><!-- /.blog-post -->

                <div class="blog-post">
                    <h2 class="blog-post-title">Nuevo centro de maternidad</h2>
                    <p class="blog-post-meta">Diciembre 14, 2023 por <a href="#">Dra. Martínez</a></p>

                    <p>Nos complace anunciar la apertura de nuestro nuevo centro de maternidad, diseñado para ofrecer una experiencia cómoda y segura a futuras mamás y sus bebés.</p>
                </div><!-- /.blog-post -->

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Más antiguos</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Más nuevos</a>
                </nav>

            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Sobre nosotros</h4>
                    <p class="mb-0">En Clínica Salud y Bienestar, nos dedicamos a ofrecer atención médica de calidad para toda la familia. Contamos con un equipo de profesionales comprometidos con su salud.</p>
                </div>

                <div class="p-3">
                    <h4 class="font-italic">Servicios destacados</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">Consultas generales</a></li>
                        <li><a href="#">Pediatría</a></li>
                        <li><a href="#">Ginecología</a></li>
                        <li><a href="#">Cardiología</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->
    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Clínica Salud y Bienestar © 2024</p>
        <p>
            <a href="#">Volver arriba</a>
        </p>
    </footer>

    @endsection

    </html>