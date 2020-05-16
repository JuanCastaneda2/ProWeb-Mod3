<meta charset="UTF-8">

<?php
	$str_pagina = "";
	if ($_FILES["arch"]["error"] > 0){
		$str_pagina.="Error: " . $_FILES["arch"]["error"] . "<br>";
	}
	echo $str_pagina;
        if (!file_exists($_POST["carpeta"].'/')) {
           mkdir($_POST["carpeta"].'/',0777,true);
           echo "La carpeta ".$_POST["carpeta"]." fue creada. <br>"; 
        }
        move_uploaded_file($_FILES["arch"]["tmp_name"], $_POST["carpeta"]."/".$_FILES["arch"]["name"]);
        echo "Guardado en: " . $_POST["carpeta"]."/" . $_FILES["arch"]["name"];
    echo "<br><a href=\"gestorarchivos.html\">Volver</a>";
?>