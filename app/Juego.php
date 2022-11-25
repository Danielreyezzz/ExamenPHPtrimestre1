<?php
namespace examenPHPtrimestre\app;

class Juego extends Soporte
{

    public function __construct(
        public String $titulo,
        protected int $numero,
        private float $precio,
        public String $consola,
        private int $minNumJugadores = 1,
        private int $maxNumJugadores = 1,

    ) {
        parent::__construct($titulo, $numero, $precio);
    }

    public function muestraJugadoresPosibles()
    {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo $this->titulo . " es para 1 jugador";
        }
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores > 1) {
            echo $this->titulo . " es para ". $this->maxNumJugadores . " jugadores";
        }
        if ($this->minNumJugadores > 1 && $this->maxNumJugadores > 1) {
            echo $this->titulo . " es de ". $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores";
        }
    }
    public function muestraResumen()
    {
        echo "</br>RESUMEN:</br>Título: " .  $this->titulo . "</br>" .
            "Número: " .  $this->numero . "</br>"  .
            "Precio: " . $this->precio . "</br>" .
            "Precio con IVA: " .  $this->getPrecioConIva() . "</br>" .
            "Consola: " . $this->consola . "</br>" .
            "Mínimo número de jugadores: " . $this->minNumJugadores . "</br>".
            "Máximo número de jugadores: " . $this->maxNumJugadores . "</br>";
    }
}
