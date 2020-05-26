<?php
    include_once dirname(__FILE__) . '/BD/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    if (mysqli_connect_errno()) {
        echo "Error en la conexión: " . mysqli_connect_error();
    }

    $sql = "SELECT * FROM personas WHERE Cedula =".$_POST["cedula"].";";
    $result =mysqli_query($con,$sql);
    $rows = $result->num_rows;

    if( $rows > 0 ){
        $sql = "UPDATE personas SET
        Nombre = ' " .$_POST["nombre"]." ', Apellido =' ".$_POST["apellido"]." ',
        Edad = ' ".$_POST["edad"]." ' ,  Correo = ' ".$_POST["email"]." '
        WHERE Cedula =".$_POST["cedula"]."; " ;
        if(mysqli_query($con,$sql)){
            echo "Se ha actualizado a ".$_POST["nombre"]." ".$_POST["apellido"]."<br>";
        }else{
            echo "Error actualizando a ".$_POST["nombre"]." ".$_POST["apellido"]."<br>";
            echo mysqli_error($con);
        }
        
    }
    else{
        $sql = "INSERT INTO personas (Nombre, Apellido, Cedula, Edad, Correo) VALUES 
        ( ' " .$_POST["nombre"]." ', ' ".$_POST["apellido"]." ', ' ".$_POST["cedula"]." ' , ' ".$_POST["edad"]." ' , ' ".$_POST["email"]." ')";
        if(mysqli_query($con,$sql)){
            echo "Se ha insertado a ".$_POST["nombre"]." ".$_POST["apellido"]."<br>";
        }else{
            echo "Error insertando a ".$_POST["nombre"]." ".$_POST["apellido"]."<br>";
            echo mysqli_error($con);
        }
    }
    echo "<br><a href=\"gestorpersonas.html\">Volver</a>";
    mysqli_close($con);
?>