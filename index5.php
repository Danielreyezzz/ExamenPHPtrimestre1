<?php

use examenPHPtrimestre\app\Juego;
use examenPHPtrimestre\app\VideoClub;
include_once "autoload.php"; 

session_start();
$vc = new Videoclub("Severo 8A"); 


// voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War",1, 19.99, "PS4", 1, 1); 
$vc->incluirJuego("The Last of Us Part II",2, 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente",3, 4.5, "es","16:9"); 
$vc->incluirDvd("Origen",4, 4.5, "es,en,fr", "16:9"); 
$vc->incluirDvd("El Imperio Contraataca",5, 3, "es,en","16:9"); 
$vc->incluirCintaVideo("Los cazafantasmas",6, 3.5, 107); 
$vc->incluirCintaVideo("El nombre de la Rosa",7, 1.5, 140); 

//listo los productos 

$_SESSION['videoclub'] = $vc;
echo "session bien";
include_once "mainAdmin.php";


// $vc->incluirSocio("Amancio Ortega",6); 

// $vc->incluirSocio("Pablo Picasso", 6); 

// $vc->listarSocios();
// // $video = new Juego("gf",2,4,"wegf",1,1);

// // $vc->socios[0]->alquilar($video);


// $vc->alquilarSocioProductos(1, [1, 2, 3])->devolverSocioProductos(1, [1, 7]);
// $vc->socios[0]->listarAlquileres();




// // //Index modificado para encadenar funciones. El index4 también ha sido modificado
// // $vc->alquilarSocioProducto(1,1)->alquilarSocioProducto(1,2)->alquilarSocioProducto(1,3)->alquilarSocioProducto(1,4)->alquilarSocioProducto(1,5)->alquilarSocioProducto(1,89);



// // //listo los socios 
// // $vc->listarSocios();
