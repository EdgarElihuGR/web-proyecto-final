<?php
$pageTitle = 'Iniciar Sesion';
$pageStyle = 'style.css';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}

require_once '../includes/config.php';

//Variables
$email = $password = '';
$email_err = $password_err = '';

//Process submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "El campo de email está vacío.";
    } else{
        $clean_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
        $email = $clean_email;
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "El campo de password está vacío.";
    } else{
        $clean_password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);//Form info sanitized
        $password = $clean_password;
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, nombre, password, email FROM usuario WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if user exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $nombre, $hashed_password, $email_extra);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $nombre;                            
                            
                            // Redirect user to welcome page
                            header("location: ../index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que ingresaste no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No existe una cuenta con el email ingresado.";
                }
            } else{
                echo "Ocurrió un error en la base de datos. " . mysqli_connect_error();
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}

?>

<?php include('../includes/head.php'); ?>

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
                <h2 class="text-center title">Iniciar sesión</h2>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <img
                        class="icon mx-auto d-block"
                        src="../Assets/Iconos/email.svg"
                    />
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email"
                        value="<?php echo $email; ?>"
                        autocomplete="off"
                        required
                    />
                    <span class="help-block"><?= $email_err ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <img
                        src="../Assets/Iconos/password.svg"
                        class="icon mx-auto d-block"
                    />
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Contraseña"
                        autocomplete="off"
                        required
                    />
                    <span class="help-block"><?= $password_err ?></span>
                </div>
                <!-- Under construction -->
                <!-- <a href="#" class="d-block link txt-info forgot-psw">
                    Olvidaste tu contraseña?
                </a> -->
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
