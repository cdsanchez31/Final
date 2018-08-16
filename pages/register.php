<?php
session_start();

ini_set('error_reporting',0);

if(isset($_SESSION['Usuario']))
{
header("Location: index.php");
}

include ('../lib/config.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>LEGISLAPP | Registration Page</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- Material Design -->
        <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
        <link rel="stylesheet" href="../../dist/css/ripples.min.css">
        <link rel="stylesheet" href="../../dist/css/MaterialAdminLTE.min.css">
        <!-- iCheck -->
        <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="">LEGISL<b>APP</b></a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Registro</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?php echo $_POST['Nombres']; ?>" required>
                        <span class="glyphicon glyphicon-star form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $_POST['Apellidos']; ?>" required>
                        <span class="glyphicon glyphicon-star form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="number" name="documento" class="form-control" placeholder="Documento" value="<?php echo $_POST['Documento']; ?>" required>
                        <span class="glyphicon glyphicon-star form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_POST['Email']; ?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $_POST['Telefono']; ?>" required>
                        <span class="glyphicon glyphicon-star form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="celular" class="form-control" placeholder="Celular" value="<?php echo $_POST['Celular']; ?>" required>
                        <span class="glyphicon glyphicon-star form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?php echo $_POST['Usuario']; ?>" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="repcontrasena" class="form-control" placeholder="Repita la contraseña" required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="check" required> Acepto los <a href="#">términos y condiciones</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <button type="submit" name="registrar" class="btn btn-primary btn-block btn-flat">Registrarme</button>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
                </div>

                <?php

                if(isset($_POST['registrar'])) {
                    $nombres = $_POST["nombres"];
                    $apellidos = $_POST["apellidos"];
                    $documento = $_POST["documento"];
                    $email = $_POST["email"];
                    $telefono = $_POST["telefono"];
                    $celular = $_POST["celular"];
                    $usuario = $_POST["usuario"];
                    $contrasena = md5($_POST["contrasena"]);
                    $repcontrasena = md5($_POST["repcontrasena"]);

                    $cusuario = "SELECT * FROM usuario WHERE Usuario = '$usuario'";
                    $comprobarusuario = Consultar($cusuario);

                    $cemail = "SELECT * FROM usuario WHERE Email = '$email'";
                    $comprobaremail = Consultar($cemail);

                    if($comprobarusuario >= 1) {
                        ?>

                        <br>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            El nombre de usuario está en uso, por favor escoja otro
                        </div>

                        <?php
                        echo "comprobo usuario";
                    } else {
                        if($comprobaremail >= 1) {
                            ?>
                            <br>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                El email ya está en uso por favor escoja otro o verifique si tiene una cuenta
                            </div>
                            <?php
                            echo "comprobo email";
                        } else {

                            if($contrasena != $repcontrasena) {
                                ?>
                                <br>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    Las contraseñas no coinciden
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php
                            } else {

                                $insertar = "INSERT INTO usuario (Nombres, Apellidos, Documento, Email, Telefono, Celular, Usuario, Contrasena, Avatar, TarjetaProfesional, UniversidadPregrado, UniversidadPostgrado, ExperienciaLaboral, FechaRegistro, IdTipoUsuario, IdEspecialidad, IdDepartamento, IdCiudad, Estado) VALUES ('$nombres','$apellidos','$documento','$email','$telefono','$celular','$usuario','$contrasena','defect.jpg','','','','',now(),1,1,0,0,'')";
                                $cinsertar = IDU($insertar);
                                if($cinsertar == true) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Felicidades se ha registrado correctamente
                                    </div>
                                    <?php

                                    header("Refresh: 2; url = login.php");
                                }
                            }
                        }
                    }
                }
                ?>
                <hr>
                <a href="login.php" class="text-center">Tengo actualmente una cuenta</a>
            </div>
        <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 3 -->
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Material Design -->
        <script src="../../dist/js/material.min.js"></script>
        <script src="../../dist/js/ripples.min.js"></script>
        <script>
        $.material.init();
        </script>
        <!-- iCheck -->
        <!-- <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
        $(function () {
        $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
        });
        });-->
    </body>
</html>
