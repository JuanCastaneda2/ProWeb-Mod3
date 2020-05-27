<?php
    include_once dirname(__FILE__) . '/BD/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    if (mysqli_connect_errno()) {
        echo "Error en la conexión: " . mysqli_connect_error();
    }

    $sql = "SELECT * FROM personas WHERE Cedula = ".$_POST["cedula"].";";
    $result =mysqli_query($con,$sql);
    echo mysqli_error($con);
    $rows = $result->num_rows;
    $username =  $_POST['username'];

    if( $rows > 0 ){

        $sql2 = "SELECT * FROM usuarios WHERE Nombre = '$username'";
        $result2 =mysqli_query($con,$sql2);
        echo mysqli_error($con);
        $rows = $result2->num_rows;
       if ($rows>0){
           echo'<script type="text/javascript">
                alert("El usuario ya esta registrado");
                window.location.href="gestorusuarios.html";
            </script>';
        }else{
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
            $rol = 0;

           $sql = "INSERT INTO usuarios (Nombre, Rol, Contraseña, Cedula) VALUES 
           ( '".$_POST["username"]."', '".$rol."', '".$contraseña."' , '".$_POST["cedula"]."')";
           if(mysqli_query($con,$sql)){
               echo "Se ha insertado el usuario correctamente <br>";
            }else{
                echo "Error insertando el usuario <br>";
                echo mysqli_error($con);
            }
        }
        
    }else{
        echo'<script type="text/javascript">
                alert("Esta cedula no existe");
                window.location.href="gestorusuarios.html";
             </script>';
    }
    echo "<br><a href=\"gestorpersonas.html\">Volver</a>";
    mysqli_close($con);
?>