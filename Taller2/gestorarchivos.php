<html>
    <body>
        <div>
            <h3>Insertar</h3>
            <form action="archivos.php" method="post" enctype="multipart/form-data">
                Carpeta: <input type="text" name="carpeta"><br>
                Archivo: <input type="file" name="arch"><br>
                <input type="submit" name="Insertar" value="Subir">
            </form>
        </div>
        <div>
            <br>
            <?php
            crear_imagen();
            echo "<img src=imagen.png?".date("U").">";

            function  crear_imagen(){
                $im = imagecreate(rand (100,300), rand(100,300)) or die("Error en la creacion de imagenes");
                $color_fondo = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255)); 

                $color1 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));              
                $color2 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
                $color3 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));        
                imagefilledrectangle ($im,   rand(0,300),  rand(0,300), rand(0,300), rand(0,300), $color1); //rectangulo (lleno)
                imagefilledrectangle ($im,   rand(0,300),  rand(0,300), rand(0,300), rand(0,300), $color2); //rectangulo (lleno)
                imagefilledrectangle ($im,   rand(0,300),  rand(0,300), rand(0,300), rand(0,300), $color3); //rectangulo (lleno)
                imagepng($im,"imagen.png");
                imagedestroy($im);
            }
            echo "<br>".date("j")."/".date("n")."/".date("Y"). "<br>";
            echo date("g").":".date("s").date("a");
        ?>
        </div> 
        <br><a href="index.html">Volver</a>
    </body>
</html>