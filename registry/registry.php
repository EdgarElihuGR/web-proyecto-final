<?php
$pageTitle = 'Registrarse';
$pageStyle = 'style.css';
include('../includes/head.php');
?>


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
                <form action="">
                    <h2 class="text-center title">Registrarse</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <img class="icon mx-auto d-block" src="../Assets/Iconos/nombre.svg" />
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" />
                        </div>
                        <div class="form-group col-md-6">
                            <img class="icon mx-auto d-block" src="../Assets/Iconos/nombre.svg" />
                            <input type="text" class="form-control" name="apellido" placeholder="Apellido" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <img src="../Assets/Iconos/email.svg" class="icon mx-auto d-block" />
                            <input type="text" class="form-control" name="email" placeholder="Email" />
                        </div>
                        <div class="form-group col-md-6">
                            <img src="../Assets/Iconos/telefono.svg" class="icon mx-auto d-block" />
                            <input type="text" class="form-control" name="telefono" placeholder="Teléfono" />
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="../Assets/Iconos/password.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="password" placeholder="Contraseña" />
                    </div>
                    <div class="form-group">
                        <img src="../Assets/Iconos/direccion.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" />
                    </div>
                    <p class="txt-info">
                        Método de pago
                    </p>
                    <div class="form-group">
                        <img src="../Assets/Iconos/nombre.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="nombreTitular" placeholder="Nombre completo del titular" />
                    </div>
                    <div class="form-group">
                        <img src="../Assets/Iconos/credito.svg" class="icon mx-auto d-block" />
                        <input type="text" class="form-control" name="numeroTarjeta" placeholder="Número de tarjeta" />
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-inline">
                                    <select class="form-control select-month">
                                        <option value="default">MM</option>
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
                                    <select class="form-control select-year">
                                        <option>YYYY</option>
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
                                <input class="form-control" required="" type="text" placeholder="CVV" />
                            </div>
                            <!-- form-group.// -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="termsCheck" />
                            <label for="termsCheck" class="form-check-label txt-info">
                                Al hacer click en Registrarse, acepta
                                nuestros
                                <a href="" class="link">
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
                        <a href="#" class="link">
                            Inicia sesión
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>