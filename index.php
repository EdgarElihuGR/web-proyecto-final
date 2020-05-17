<?php
$pageTitle = 'Ambulancia Por Ti';
$pageStyle = 'style.css';
$pageName = 'index';
include('includes/head.php');
?>

<header class="header">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container nav-container">
            <a href="#" class="navbar-brand">
                <img src="Assets/Iconos/Logo.svg" width="100" alt="Logo" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#qa-navbar" aria-controls="qa-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars icon-toggle-btn"></i>
            </button>
            <div id="qa-navbar" class="navbar-collapse collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img class="menu-icon" src="Assets/Iconos/servicios.svg" height="40" alt="icono servicio" />
                        <a class="nav-link nav-link-custom" href="">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar" />
                        <a class="nav-link nav-link-custom" href="">Solicitar</a>
                    </li>
                    <li id="item-about" class="nav-item">
                        <img class="menu-icon" src="Assets/Iconos/nosotros.svg" height="40" alt="icono nosotros" />
                        <a class="nav-link nav-link-custom" href="">
                            <p class="nav-link-p-about">Sobre</p>
                            <p class="nav-link-p-about">Nosotros</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="Assets/Iconos/contacto.svg" height="40" alt="icono contacto" />
                        <a class="nav-link nav-link-custom" href="#">Contacto</a>
                        <a id="link-sign-in-out" class="nav-link nav-link-custom" href="">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="hero">
    <div class="container-custom">
        <figure class="web-nameWrapper">
            <img class="web-name-image" src="Assets/nombre_03.png" alt="Nombre web" />
        </figure>
        <div class="slogan">
            <h1 class="title">
                Nosotros atendemos tu <br />
                emergencia
            </h1>
            <div class="btn-request btn-request-hero">
                <img class="btn-request-icon" src="Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar" />
                <a class="link" href="">Solicita tu ambulancia</a>
            </div>
        </div>
    </div>
</section>
<section class="about">
    <div class="container-custom">
        <div class="about-detailsWrapper">
            <h1 class="about-title title">¿Quiénes somos?</h1>
            <div class="about-descriptionWrapper">
                <img class="about-icon" src="Assets/Iconos/nosotros.svg" height="40" alt="icono info" />
                <p class="about-description">
                    Somos una empresa dedicada a brindar el servicio de
                    solicitud de ambulancias online. Nos encargamos de
                    proveer soluciones de movilidad para los servicios
                    de emergencia con la finalidad de mejorar la
                    atención de las emergencias y brindarle información
                    precisa al usuario.
                </p>
            </div>
        </div>
        <figure class="about-imageWrapper">
            <img class="about-image" src="Assets/ambulancia-elipse_07.png" width="400" alt="Ambulancia click" />
        </figure>
    </div>
</section>
<section id="servicios" class="services">
    <div class="container-custom">
        <!-- <div class="servicesWrapper"> -->
        <article id="traslado" class="article">
            <img class="services-icon" src="Assets/Iconos/traslado.svg" height="40" alt="icono traslado" />
            <div class="services-descriptionWrapper">
                <h1 class="services-title">Traslado</h1>
                <p class="services-description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Neque, ea veritatis nam, repudiandae sint
                    quisquam quaerat totam aperiam dolores
                    exercitationem reiciendis molestiae recusandae dicta
                    rerum.
                </p>
                <div class="btn-request">
                    <img class="btn-request-icon" src="Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar2" />
                    <a class="link" href="">Solicitar</a>
                </div>
            </div>
        </article>
        <article id="vital" class="article">
            <img class="services-icon" src="Assets/Iconos/vital.svg" height="40" alt="icono vital" />
            <div class="services-descriptionWrapper">
                <h1 class="services-title">Vital</h1>
                <p class="services-description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Neque, ea veritatis nam, repudiandae sint
                    quisquam quaerat totam aperiam dolores
                    exercitationem reiciendis molestiae recusandae dicta
                    rerum.
                </p>
                <div class="btn-request">
                    <img class="btn-request-icon" src="Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar2" />
                    <a class="link" href="">Solicitar</a>
                </div>
            </div>
        </article>
        <!-- </div> -->
    </div>
</section>
<section id="contacto" class="contact">
    <div class="contact-titleWrapper">
        <h1 class="contact-title title">Contacto</h1>
    </div>
    <div class="contact-info-box">
        <div id="info-email" class="contact-infoWrapper">
            <img class="contact-icon" src="Assets/Iconos/email.svg" height="40" alt="icono email" />
            <h3 class="contact-info">contacto@gmail.com</h3>
        </div>
        <div id="info-phone" class="contact-infoWrapper">
            <img class="contact-icon" src="Assets/Iconos/telefono.svg" height="40" alt="icono cel" />
            <h3 class="contact-info">35-87-12-09-38</h3>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>

<!-- Script navbar -->
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-185px";
        }
        prevScrollpos = currentScrollPos;
    };
</script>
</body>

</html>