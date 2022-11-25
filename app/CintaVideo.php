<?php
namespace examenPHPtrimestre\app;



class CintaVideo extends Soporte
{

    public function __construct(
        public String $titulo,
        protected int $numero,
        private float $precio,
        private String $duracion

    ) {
        parent::__construct($titulo, $numero, $precio);
    }
    public function muestraResumen()
    {
        echo "</br>RESUMEN:</br>Título: " .  $this->titulo . "</br>" .
            "Número: " .  $this->numero . "</br>"  .
            "Precio: " . $this->precio . "</br>" .
            "Precio con IVA: " .  $this->getPrecioConIva() . "</br>" .
            "Duración: " . $this->duracion . "</br>";
    }
}
