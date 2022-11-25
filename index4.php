<?php
use ExamenPHPtrimestre1\app\Cliente;
use ExamenPHPtrimestre1\app\Disco;
use ExamenPHPtrimestre1\app\Juego;
include_once "autoload.php";
$cliente1 = new Cliente("Bruce Wayne", 100);
$cliente2 = new Cliente("Clark Kent", 101);

//mostramos el número de cada cliente creado 
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

//instancio algunos soportes 
$soporte1 = new Juego("Kingdom Hearts", 1, 30, "PS4",1, 4);
$soporte2 = new Juego("The Last of Us Part II", 2, 49.99, "PS4", 1, 1);  
$soporte3 = new Disco("Origen", 3, 15, "es,en,fr", "16:9");
$soporte4 = new Disco("El Imperio Contraataca", 4, 3, "es,en","16:9");


//Modificado para encadenar 

$cliente1->alquilar($soporte1)->alquilar($soporte2)->alquilar($soporte4)->alquilar($soporte3)->devolver(1)->alquilar($soporte3);

$cliente1->listarAlquileres();
