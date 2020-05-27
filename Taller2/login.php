<?php
 include_once dirname(__FILE__) . '/BD/config.php';
 $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
 if (mysqli_connect_errno()) {
     echo "Error en la conexión: " . mysqli_connect_error();
 }
 $usuario = $_POST['username'];
 $contraseña = $_POST['contraseña'];

 $sql = "SELECT * FROM Usuarios WHERE Nombre = '$usuario'";
        echo mysqli_error($con);
        $datos = mysqli_query($con,$sql);
        $result = mysqli_fetch_array($datos);
        if($result != null && password_verify($contraseña, $result['Contraseña'])){
            if($result['Rol'] == 1 ){
                Header("Location: usuario.php");
            }else if($result['Rol'] == 0 ){
                Header("Location: admin.php");
            }else {
                echo "Credenciales incorrectas";
            }
            
        }
        else{
            echo "Credenciales incorrectas";
        }
        mysqli_close($con);