<?php
/*
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "legislappbd";

//creación de la conexión a la base de datos con mysql_connect()
$conexion = new mysqli( $servidor, $usuario, $password, $basededatos);

if ($conexion -> connect_errno){
    echo "No Conectado";
}else{
    echo "Conectado";
}
*/



function Consultar($consulta){
    $conexion = new mysqli( 'localhost', 'root', '', 'legislappbd');

    if ($conexion -> connect_errno){
        echo "No Conectado";
    }else{
        $result = mysqli_query($conexion, $consulta);
        $nrows = mysqli_num_rows($result);
        //echo "Conectado consulta '$consulta' y = '$nrows'";
        return $nrows;

    }
}


function IDU($consulta){
    $conexion = new mysqli( 'localhost', 'root', '', 'legislappbd');

    if ($conexion -> connect_errno){
        echo "No Conectado";
    }else{
        $result = mysqli_query($conexion, $consulta);
        if ($result == true){
            //echo "Conectado consulta '$consulta' ";
            return $result;
        }else{
            //echo "errooooorrrr";
            return $result;
        }
    }
}

?>