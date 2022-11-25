<?php
namespace ExamenPHPtrimestre1\app;

class Cliente
{
    private $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    public function __construct(
        public String $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3,
    ) {
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        $tieneAlquilado = false;
        foreach ($this->soportesAlquilados as $value) {
            if ($value->getNumero() == $s->getNumero()) {
                $tieneAlquilado = true;
            }
        }

        return $tieneAlquilado;
    }

    //Métodos modificados para devolver $this. No tiene sentido que devuelvan un booleano
    public function alquilar(Soporte $s)
    {
        if ($this->tieneAlquilado($s)) {
            echo "</br>El soporte ya está alquilado</br>";
            
        } elseif ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "</br>Se ha superado el cupo de alquileres. Intentelo más tarde</br>";
         
        } else {
            ++$this->numSoportesAlquilados;
            array_push($this->soportesAlquilados, $s);
            echo "</br>El soporte ha sido alquilado con éxito </br>";
           
        }
        return $this;
    }
    public function devolver(int $numSoporte)
    {
        $isAlquilado = false;
        foreach ($this->soportesAlquilados as $key => $value) {
            if ($value->getNumero() == $numSoporte) {
                echo "</br>El soporte ha sido devuelto con éxito</br>";
                unset($this->soportesAlquilados[$key]);
                --$this->numSoportesAlquilados;
                $isAlquilado = true;
            }
        }
        if (!$isAlquilado) {
            echo "</br>No alquilaste este soporte</br>";
        }
        return $this;
    }
    public function listarAlquileres()
    {
        echo $this->nombre . " tiene</br>" . $this->numSoportesAlquilados . "</br>" .
            "Soportes alquilados: </br>";
        foreach ($this->soportesAlquilados as $key => $value) {
            foreach ($value as $llave => $valor) {
                echo $llave . " - " . $valor . "</br>";
            }
        }
    }

    public function muestraResumen()
    {
        echo "</br>RESUMEN:</br>Nombre: " .  $this->nombre . "</br>" .
            "Cantidad de alquileres: " .  $this->numSoportesAlquilados . "</br>";
    }
}
