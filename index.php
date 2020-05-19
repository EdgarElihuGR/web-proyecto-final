<?php
session_start();
$pageTitle = 'Ambulancia Por Ti';
$pageStyle = 'style.css';
$pageName = 'index';
?>

<?php include('includes/head.php'); ?>

<?php include('includes/nav.php'); ?>

<button id="btn-top" title="Volver arriba">
    <i class="fas fa-arrow-up"></i>
</button>
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
<section id="about" class="about">
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
<section id="services" class="services">
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
<section id="contact" class="contact">
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

</body>

</html>