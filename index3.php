<?php
use ExamenPHPtrimestre1\app\Juego;
include "autoload.php";

$miJuego = new Juego("God of War: Ragnarök", 26, 49.99, "PS4", 1, 1); 
echo $miJuego->muestraJugadoresPosibles();
$miJuego->muestraResumen();
