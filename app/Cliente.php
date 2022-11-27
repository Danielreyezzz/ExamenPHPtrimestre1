<?php
namespace examenPHPtrimestre\app;
include_once "autoload.php";

use examenPHPtrimestre\util\CupoSuperadoException;
use examenPHPtrimestre\util\SoporteNoEncontradoException;
use examenPHPtrimestre\util\SoporteYaAlquiladoException;
use Exception;

class Cliente
{
    private $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    public function __construct(
        public String $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3
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
        try{
        if ($this->tieneAlquilado($s)) {
            throw new SoporteYaAlquiladoException();
            
        } elseif ($this->numSoportesAlquilados > $this->maxAlquilerConcurrente) {
           
            throw new CupoSuperadoException();
        } 
        else {
            ++$this->numSoportesAlquilados;
            array_push($this->soportesAlquilados, $s);
            $s->setAlquilado(true);
            echo "</br>El soporte ha sido alquilado con éxito </br>";
           
        }
        return $this;
    }catch(SoporteYaAlquiladoException  | CupoSuperadoException $ms ){
        echo "¡Capturada una excepción! " . $ms->getMessage();
    }
}
    public function devolver(int $numSoporte)
    {
        $isAlquilado = false;
        foreach ($this->soportesAlquilados as $key => $value) {
            if ($value->getNumero() == $numSoporte) {
                echo "</br>El soporte ha sido devuelto con éxito</br>";
                unset($this->soportesAlquilados[$key]);
                --$this->numSoportesAlquilados;
                $value->setAlquilado(false);
                $isAlquilado = true;
                return $this;
            }
        }
        if (!$isAlquilado) {
            try{
                throw new SoporteNoEncontradoException();
            }catch(SoporteNoEncontradoException $ms){
                echo "¡Capturada una excepción! " . $ms->getMessage();
                return $this;
            }
            
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
