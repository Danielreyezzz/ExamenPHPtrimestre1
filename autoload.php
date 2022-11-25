<?php

//Todas las clases tienen el mismo namespace, y los index utilizan las clases que necesitan mediante el use
//Autoload incluido. Los index la implementan. De esta manera nos evitamos tener que incluir cada clase correspondiente


function autoload($nombreClase)
{
  $dir = str_replace("\\", "/", $nombreClase); 
    include_once "../" . $dir . ".php";
}

spl_autoload_register('autoload');


                                        