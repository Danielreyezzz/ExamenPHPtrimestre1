<?php
// include_once "Cliente.php";
// include_once "Juego.php";
// include_once "Disco.php";
// $cliente1 = new Cliente("Bruce Wayne", 100);
// $cliente2 = new Cliente("Clark Kent", 101);

// //mostramos el número de cada cliente creado 
// echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
// echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

// //instancio algunos soportes 
// $soporte1 = new Juego("Kingdom Hearts", 1, 30, "PS4",1, 4);
// $soporte2 = new Juego("The Last of Us Part II", 2, 49.99, "PS4", 1, 1);  
// $soporte3 = new Disco("Origen", 3, 15, "es,en,fr", "16:9");
// $soporte4 = new Disco("El Imperio Contraataca", 4, 3, "es,en","16:9");

// //alquilo algunos soportes
// $cliente1->alquilar($soporte1);
// $cliente1->alquilar($soporte2);
// // $cliente1->alquilar($soporte3);

// // //voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
// // $cliente1->alquilar($soporte1);
// // //el cliente tiene 3 soportes en alquiler como máximo
// // //este soporte no lo va a poder alquilar
// $cliente1->alquilar($soporte4);
// // //este soporte no lo tiene alquilado
// $cliente1->devolver(1);
// // //devuelvo un soporte que sí que tiene alquilado
// // $cliente1->devolver(2);
// // //alquilo otro soporte
// // $cliente1->alquilar($soporte4);
// // //listo los elementos alquilados
// $cliente1->listarAlquileres();
// // //este cliente no tiene alquileres
// // $cliente2->devolver(2);
