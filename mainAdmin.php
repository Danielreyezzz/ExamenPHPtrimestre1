<?php

use examenPHPtrimestre\app\VideoClub;

include_once "autoload.php";
session_start();

$videoclub = $_SESSION['videoclub'];

$videoclub->listarSocios();
$videoclub->listarProductos();
?>