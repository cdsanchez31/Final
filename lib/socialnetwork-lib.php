<?php

function Headerb (){
?>
<!-- START HEADER -->
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">LEGISL<b>APP</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php
                $noti = mysqli_query("SELECT * FROM notificaciones WHERE user2 = '".$_SESSION['id']."' AND leido = '0' ORDER BY id_not desc");
                $cuantas = mysqli_num_rows($noti);
                ?>

                <!-- Notifications: style can be found in dropdown.less -->

                <li>
                    <a href="">
                        <span class="fa fa-user"></span> PERFIL
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="fa fa-bell"></span> NOTIFICACIONES
                    </a>
                </li>

                <li>
                    <a href="../pages/mailbox.php">
                        <span class="fa fa-envelope"></span> B.ENTRADA
                    </a>
                </li>

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER -->
<?php
}
?>

<?php
    function Side (){
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><span class="hidden-xs"><?php echo ucwords($_SESSION['usuario']); ?></span></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
}
?>