<?php
$pageTitle = 'Iniciar Sesion';
$pageStyle = 'style.css';
?>

<?php include('../includes/head.php'); ?>

<?php include('../includes/config.php'); ?>

<header class="header">
    <figure class="logo float-lg-left">
        <a href="#">
            <img src="../Assets/Iconos/Logo.svg" />
        </a>
    </figure>
</header>
<div class="outer">
    <div class="middle">
        <div class="card card-body card-custom mx-auto">
            <form action="">
                <h2 class="text-center title">Iniciar sesión</h2>
                <div class="form-group">
                    <img
                        class="icon mx-auto d-block"
                        src="../Assets/Iconos/email.svg"
                    />
                    <input
                        type="text"
                        class="form-control"
                        name="email"
                        placeholder="Email"
                    />
                </div>
                <div class="form-group">
                    <img
                        src="../Assets/Iconos/password.svg"
                        class="icon mx-auto d-block"
                    />
                    <input
                        type="text"
                        name="password"
                        class="form-control"
                        placeholder="Contraseña"
                    />
                </div>
                <a href="#" class="d-block link txt-info forgot-psw">
                    Olvidaste tu contraseña?
                </a>
                <div class="form-group text-center">
                    <button
                        type="submit"
                        class="btn btn-danger btn-login"
                    >
                        Iniciar sesión
                    </button>
                </div>
                <p class="text-center txt-info">
                    ¿No tienes cuenta?
                    <a href="../registry/registry.php" class="d-block link">
                        Regístrate
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
