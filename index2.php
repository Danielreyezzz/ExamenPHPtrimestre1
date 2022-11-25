<?php
include_once "autoload.php";
use ExamenPHPtrimestre1\app\Disco;

$miDisco = new Disco("Origen", 24, 15, "es, en, fr", "16:9");
$miDisco->muestraResumen();


