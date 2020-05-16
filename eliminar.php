<?php
    include_once dirname(__FILE__) . '/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    if (mysqli_connect_errno()) {
        echo "Error en la conexión: " . mysqli_connect_error();
    }

    $sql = "DELETE FROM personas WHERE Cedula =".$_POST["ceduladel"].";";

    if( mysqli_query($con,$sql)){
        echo "La persona con cedula ".$_POST["ceduladel"]." fue eliminada <br>";
    }else{
        echo "Error eliminando la persona con cedula ".$_POST["ceduladel"]."<br>";
        echo mysqli_error($con);
    }
    echo "<br><a href=\"gestorpersonas.html\">Volver</a>";
    mysqli_close($con);
?>
