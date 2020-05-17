<?php
$pageTitle = 'Solicitar';
$pageStyle = 'style.css';
$pageName = 'Solicitar';
include('../includes/head.php');
?>

<div class="navWrapper">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container nav-container">
            <a href="#" class="navbar-brand">
                <img src="../Assets/Iconos/Logo.svg" width="100" alt="Logo" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#qa-navbar" aria-controls="qa-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars icon-toggle-btn"></i>
            </button>
            <div id="qa-navbar" class="navbar-collapse collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img class="menu-icon" src="../Assets/Iconos/servicios.svg" height="40" alt="icono servicio" />
                        <a class="nav-link nav-link-custom" href="">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="../Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar" />
                        <a class="nav-link nav-link-custom" href="">Solicitar</a>
                    </li>
                    <li id="item-about" class="nav-item">
                        <img class="menu-icon" src="../Assets/Iconos/nosotros.svg" height="40" alt="icono nosotros" />
                        <a class="nav-link nav-link-custom" href="">
                            <p class="nav-link-p-about">Sobre</p>
                            <p class="nav-link-p-about">Nosotros</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="../Assets/Iconos/contacto.svg" height="40" alt="icono contacto" />
                        <a class="nav-link nav-link-custom" href="#">Contacto</a>
                        <a id="link-sign-in-out" class="nav-link nav-link-custom" href="">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<header class="container header">
    <h2 class="text-center title">Solicitar Ambulancia</h2>
</header>
<div class="content-box">
    <div id="googleMap" class="map border"></div>
    <main class="container main-container">
        <form action="">
            <div class="form-row justify-content-center form-row form-row1">
                <div class="col-6 col-sm-6 form-group select-tipo-container">
                    <img src="../Assets/Iconos/solicitar.svg" class="icon" alt="tipo" height="40px" />
                    <select class="form-control selectpicker" id="select_tipo" name="tipo_ambulancia" title="Tipo" data-style="btn-primary">
                        <option value="1">Traslado</option>
                        <option value="2">Vital</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 form-group input-ubicacion-container">
                    <img src="../Assets/Iconos/ubicacion.svg" class="icon" alt="tipo" height="40px" />
                    <input type="text" id="ubicacion-autocomplete" class="form-control input-ubicacion" onfocus="geoLocate()" placeholder="Ubicación de la emergencia" />
                    <button class="btn btn-ubicacion btn-danger" type="button">
                        Utilizar ubicación actual
                    </button>
                </div>
            </div>
            <div class="form-row justify-content-center form-row form-row2">
                <div class="col-sm-8 col-md-6 form-group select-hospital-container">
                    <img src="../Assets/Iconos/hospital.svg" class="icon" alt="hospital" height="40px" />
                    <select name="hospital" id="select-hospital" class="form-control selectpicker" title="Hospital" data-style="btn-primary">
                    </select>
                    <p>
                        *Solo se muestran los hospitales más cercanos a
                        la ubicación de la emergencia
                    </p>
                </div>
                <div class="col-6 col-md-6 form-group submit-solicitar-container">
                    <button class="btn btn-danger" type="submit">
                        Solicitar
                    </button>
                </div>
            </div>
        </form>
    </main>
</div>
<?php include('../includes/footer.php') ?>
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