<?php
$pageTitle = 'Registrarse';
$pageStyle = 'style.css';
$nombre = $apellido = $email = $telefono = $password = $confirm_password = $direccion = "";
$nombre_titular = $numero_tarjeta = $mes_exp = $year_exp = $cvv = "";
$email_err = $password_err = $confirm_password_err = "";
require_once "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Introduce tu email.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM usuario WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $clean_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
            $param_email = $clean_email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "El email ya está registrado.";
                } else {
                    $email = $clean_email;
                }
            } else {
                echo "Algo salió mal. Por favor intenta de nuevo";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Introduce una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "La contraseña debe de tener al menos 6 caracteres.";
    } else {
        $clean_password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
        $password = $clean_password;
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirma tu contraseña.";
    } else {
        $clean_confirm_password = filter_var(trim($_POST["confirm_password"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
        $confirm_password = $clean_confirm_password;
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "La contraseña no concuerda.";
        }
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO usuario (nombre, apellido, email, telefono, password, direccion) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $param_nombre,
                $param_apellido,
                $param_email,
                $param_telefono,
                $param_password,
                $param_direccion
            );

            // Set parameters
            $clean_nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
            $param_nombre = $clean_nombre;

            $clean_apellido = filter_var(trim($_POST["apellido"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
            $param_apellido = $clean_apellido;

            $param_email = $email;

            $clean_telefono = filter_var(trim($_POST["telefono"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
            $param_telefono = $clean_telefono;

            $param_password = password_hash($password, PASSWORD_DEFAULT);

            $clean_direccion = filter_var(trim($_POST["direccion"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
            $param_direccion = $clean_direccion;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: ../login/login.php");
            } else {
                echo "Algo ocurrió mal al crear tu usuario. Por favor intenta de nuevo " . mysqli_error($conn);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    }
}
?>

<?php include('../includes/head.php'); ?>

<body>
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
                <form action="" method="post">
                    <h2 class="text-center title">Registrarse</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <img class="icon mx-auto d-block" src="../Assets/Iconos/nombre.svg" />
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" pattern="[A-Za-zñÑ ]{1,32}" required />
                        </div>
                        <div class="form-group col-md-6">
                            <img class="icon mx-auto d-block" src="../Assets/Iconos/nombre.svg" />
                            <input type="text" class="form-control" name="apellido" placeholder="Apellido" pattern="[A-Za-zñÑ ]{1,32}" required />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <img src="../Assets/Iconos/email.svg" class="icon mx-auto d-block" />
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $email ?>" required autocomplete="off"/>
                            <span class="help-block"><?= $email_err; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <img src="../Assets/Iconos/telefono.svg" class="icon mx-auto d-block" />
                            <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" required />
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <img src="../Assets/Iconos/password.svg" class="icon mx-auto d-block" />
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" value="<?= $password ?>" required autocomplete="off"/>
                        <span class="help-block"><?= $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirmar Contraseña" value="<?= $confirm_password ?>" required autocomplete="off"/>
                        <span class="help-block"><?= $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group ">
                        <img src="../Assets/Iconos/direccion.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required />
                    </div>
                    <p class="txt-info">
                        Método de pago
                    </p>
                    <div class="form-group">
                        <img src="../Assets/Iconos/nombre.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="nombreTitular" placeholder="Nombre completo del titular" pattern="[A-Za-zñÑ ]{1,32}" required />
                    </div>
                    <div class="form-group">
                        <img src="../Assets/Iconos/credito.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="numeroTarjeta" pattern="[0-9]{16|19}" placeholder="Número de tarjeta" required />
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-inline">
                                    <select class="form-control select-month" name="mes" required>
                                        <option selected disabled>MM</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <span class="slash-separator">/</span>
                                    <select class="form-control select-year" name="year" required>
                                        <option selected disabled>YYYY</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                        <option>2026</option>
                                        <option>2027</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" type="number" placeholder="CVV" pattern="[0-9]{3}" />
                            </div>
                            <!-- form-group.// -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="termsCheck" required />
                            <label for="termsCheck" class="form-check-label txt-info">
                                Al hacer click en Registrarse, acepta
                                nuestros
                                <a href="#" class="link">
                                    Términos, Política de datos y Política
                                    de cookies.
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-danger btn-registry">
                            Registrarse
                        </button>
                    </div>
                    <p class="text-center txt-info account-question">
                        ¿Ya tienes una cuenta?
                        <a href="../login/login.php" class="link">
                            Inicia sesión
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>