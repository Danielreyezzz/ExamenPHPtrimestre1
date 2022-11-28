<?php
include_once "autoload.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Bienvenido: " . $_SESSION['usuario'];
    ?>
   
    <h2>Pulsando este botón puedes salir a la pantalla de login:</h2>
    <?php
    echo '<form name="formulario" method="POST">
    <input class="button" type="submit" name="salir" value="salir" />
    </form>';
    if (isset($_POST["salir"])) {
        session_destroy();
        header("Location: index.php");
    }
    ?>

</body>

</html>