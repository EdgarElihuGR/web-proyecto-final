<?php 
    $changeDirAbove = ''; //Variable to add ../ to routes when the .php file is inside a dir
    $routeToIndex = ''; //Variable to add index.php to go to index when .php file is inside a dir

    if($pageName != 'index') { //If page name is not index
        $changeDirAbove = '../';
        $routeToIndex = '/';
    }

    session_start();
?>

<div class="navWrapper">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container nav-container">
            <a href="<?= $changeDirAbove ?>index.php" class="navbar-brand">
                <img src="<?= $changeDirAbove ?>Assets/Iconos/Logo.svg" width="100" alt="Logo" />
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#qa-navbar" aria-controls="qa-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars icon-toggle-btn"></i>
            </button>
            <div id="qa-navbar" class="navbar-collapse collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <img class="menu-icon" src="<?= $changeDirAbove ?>Assets/Iconos/servicios.svg" height="40" alt="icono servicio" />
                        <a class="nav-link nav-link-custom" href="<?= $changeDirAbove ?>#services">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="<?= $changeDirAbove ?>Assets/Iconos/solicitar.svg" height="40" alt="icono solicitar" />
                        <a class="nav-link nav-link-custom" href="solicitar/solicitar.php">Solicitar</a>
                    </li>
                    <li id="item-about" class="nav-item">
                        <img class="menu-icon" src="<?= $changeDirAbove ?>Assets/Iconos/nosotros.svg" height="40" alt="icono nosotros" />
                        <a class="nav-link nav-link-custom" href="<?= $changeDirAbove ?>#about">
                            <p class="nav-link-p-about">Sobre</p>
                            <p class="nav-link-p-about">Nosotros</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <img class="menu-icon" src="<?= $changeDirAbove ?>Assets/Iconos/contacto.svg" height="40" alt="icono contacto" />
                        <a class="nav-link nav-link-custom" href="<?= $changeDirAbove ?>#contact">Contacto</a>
                        <?php if((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) : ?>
                        <a id="link-sign-in-out" class="nav-link nav-link-custom" href="includes/logout.php">
                            <?= htmlspecialchars("Hola ".$_SESSION['name']);?>
                        </a>
                        <?php else: ?>
                        <a id="link-sign-in-out" class="nav-link nav-link-custom" href="login/login.php">
                            <?= "Iniciar Sesión";?>
                        </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>