<?php
    include_once dirname(__FILE__) . '/config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    $sql = "CREATE TABLE Personas 
    (
    PID INT NOT NULL AUTO_INCREMENT, 
    Cedula BIGINT,
    PRIMARY KEY(PID,Cedula),
    Nombre CHAR(15),
    Apellido CHAR(15),
    Correo CHAR(50),
    Edad INT
    )";
    if (mysqli_query($con, $sql)) {
        echo "Tabla Personas creada correctamente";
    } else {
        echo "Error en la creacion " . mysqli_error($con);
    }
    $sql = "CREATE TABLE Usuarios 
    (
    PID INT NOT NULL AUTO_INCREMENT, 
    Username CHAR(20),
    PRIMARY KEY(PID,Username),
    Rol BIT(1),
    Contraseña CHAR(50),
    Cedula BIGINT
    )";
    if (mysqli_query($con, $sql)) {
        echo "Tabla Personas creada correctamente";
    } else {
        echo "Error en la creacion " . mysqli_error($con);
    }
?>
