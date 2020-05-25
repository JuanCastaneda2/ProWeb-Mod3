<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include_once dirname(__FILE__) . '/config.php';
            $str_datos = "";
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
                if (mysqli_connect_errno()) {
                $str_datos.= "Error en la conexión: " . mysqli_connect_error();
            }
            $str_datos.='<table border="1" style="width:100%">';
            $str_datos.='<tr>';
            $str_datos.='<th>Nombre</th>';
            $str_datos.='<th>Apellido</th>';
            $str_datos.='<th>Cedula</th>';
            $str_datos.='<th>Edad</th>';
            $str_datos.='<th>Email</th>';
            $str_datos.='</tr>';
            $sql = "SELECT * FROM Personas ORDER BY " .$_POST["columna"]. " " .$_POST["orden"]. ";";
            $resultado = mysqli_query($con,$sql);
            while($fila = mysqli_fetch_array($resultado)) {
              $str_datos.='<tr>';
              $str_datos.= "<td>".$fila['Nombre']."</td> <td>".$fila['Apellido']."</td> <td>".$fila['Cedula']."</td> <td>".$fila['Edad']."</td> <td>".$fila['Correo']."</td>";
              $str_datos.= "</tr>";
            }
            $str_datos.= "</table>";
            echo $str_datos;
            echo "<br><a href=\"gestorpersonas.html\">Volver</a>";
            mysqli_close($con);
        ?>
    </body>
</html>
