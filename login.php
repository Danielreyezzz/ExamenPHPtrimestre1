<?php

    $usuario = $_POST['user'];
    $password = $_POST['password'];

    if (empty($usuario) || empty($password)) {
        echo "Debes introducir un usuario y contraseña";
        include "index.php";
    } else {
        if ($usuario == "admin" && $password == "admin") {
            session_start();
            $_SESSION['admin'] = $usuario;
            include "index5.php";
        }elseif ($usuario == "usuario" && $password == "usuario") {
            session_start();
            $_SESSION['usuario'] = $usuario;
            include "main.php";
        } else {
            echo "Usuario o contraseña no válidos!";
            include "index.php";
        }
    }
