<?php

namespace examenPHPtrimestre\app {

    use examenPHPtrimestre\util\ClienteNoEncontradoException;
    use examenPHPtrimestre\util\CupoSuperadoException;
    use examenPHPtrimestre\util\SoporteNoEncontradoException;
    use examenPHPtrimestre\util\SoporteYaAlquiladoException;

    class VideoClub
    {
        private $producto = [];
        private int $numProductos = 0;
        public $socios = [];
        private int $numSocios = 0;
        public int $numProductosAlquilados = 0;
        public int $numTotalAlquileres = 0;

        public function __construct(
            private String $nombre,
        ) {
        }

        private function incluirProducto(Soporte $producto)
        {
            array_push($this->producto, $producto);
            ++$this->numProductos;
        }
        public function incluirCintaVideo(String $titulo, int $numero, float $precio, String $duracion)
        {
            $cinta = new CintaVideo($titulo, $numero, $precio, $duracion);
            $this->incluirProducto($cinta);
        }
        public function incluirJuego(String $titulo, int $numero, float $precio, String $consola, int $minJ, int $maxJ)
        {
            $juego = new Juego($titulo, $numero, $precio, $consola, $minJ, $maxJ);
            $this->incluirProducto($juego);
        }
        public function incluirDvd(String $titulo, int $numero, float $precio, String $idiomas, String $pantalla)
        {
            $disco = new Disco($titulo, $numero, $precio, $idiomas, $pantalla);
            $this->incluirProducto($disco);
        }
        public function incluirSocio(String $nombre, int $maxAlquileresConcurrentes)
        {
           ++$this->numSocios;
            $socio = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
            array_push($this->socios, $socio);
        }
        public function listarProductos()
        {
            foreach ($this->producto as $key => $value) {
                foreach ($value as $llave => $valor) {
                    echo $llave . " - " . $valor . "</br>";
                }
            }
        }
        public function listarSocios()
        {
            foreach ($this->socios as $key => $value) {
                foreach ($value as $llave => $valor) {
                    echo $llave . " - " . $valor . "</br>";
                }
            }
        }
        public function alquilarSocioProducto(int $numeroCliente, int $numeroSoporte)
        {
            $cliente = false;
            $soporte = false;
            try{
            foreach ($this->socios as $socio) {
                if ($socio->getNumero() == $numeroCliente) {
                    $cliente = true;
                    try{
                    foreach ($this->producto as $productito) {
                        if ($productito->getNumero() == $numeroSoporte) {
                            $soporte = true;
                            $socio->alquilar($productito);
                        }
                    }
                    if (!$soporte) {
                        throw new SoporteNoEncontradoException();
                    }
                    return $this;
                }catch(CupoSuperadoException | SoporteYaAlquiladoException | SoporteNoEncontradoException $ms){
                echo "¡Capturada una excepción! " . $ms->getMessage();
            }
                }

        }
        if (!$cliente) {
            throw new ClienteNoEncontradoException();
        }
    }catch(ClienteNoEncontradoException $ms){
        echo "¡Capturada una excepción! " . $ms->getMessage();
    }
    return $this;
}
        public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
        {
            $alquilado = false;
            try{
                //Comprobamos si algun producto ya está alquilado
                foreach ($this->producto as $key => $value) {
                    foreach ($numerosProductos as $clave => $valor) {
                        if ($value->getNumero() == $valor) {
                            if ($value->getAlquilado()) {
                                $alquilado = true;
                            }
                        }
                    }
                }
                //Si no lo está, llamamos a la funcion alquilarSocioProducto
                //Si hay alguno ya alquilado lanzamos exception
                if(!$alquilado){
                    foreach ($numerosProductos as $key => $value) {
                        $this->alquilarSocioProducto($numSocio, $value);
                    }
                    echo "</br>Todos los soportes han sido ha sido alquilado con éxito</br>";
                }else{
                    throw new SoporteYaAlquiladoException("</br>Algún soporte elegido ya está alquilado</br>");
                }

            }catch(SoporteYaAlquiladoException $ms){
                echo "¡Capturada una excepción! " . $ms->getMessage();
            }
            return $this;
        }
        //Función igual a alquilarSocioProducto, pero llamando a devolver()
        public function devolverSocioProducto(int $numeroCliente, int $numeroSoporte){
            foreach ($this->socios as $socio) {
                if ($socio->getNumero() == $numeroCliente) {
                    foreach ($this->producto as $productito) {
                        if ($productito->getNumero() == $numeroSoporte) {
                            $socio->devolver($productito->getNumero());
                        }
                    }
                }
            }

            return $this;
        }
        //Función igual a alquilarSocioProductos pero usando devolverSocioProducto()
        public function devolverSocioProductos(int $numSocio, array $numerosProductos)
        {
            $alquilado = true;
            try{
                foreach ($this->producto as $key => $value) {
                    foreach ($numerosProductos as $clave => $valor) {
                        if ($value->getNumero() == $valor) {
                            if (!$value->getAlquilado()) {
                                $alquilado = false;
                            }
                        }
                    }
                }
                if($alquilado){
                    foreach ($numerosProductos as $key => $value) {
                        $this->devolverSocioProducto($numSocio, $value);
                    }
                    echo "</br>Todos los soportes han sido ha sido devuelto con éxito</br>";
                }else{
                    throw new SoporteYaAlquiladoException("</br>Algún soporte elegido no ha sido alquilado</br>");
                }

            }catch(SoporteYaAlquiladoException $ms){
                echo "¡Capturada una excepción! " . $ms->getMessage();
            }
            return $this;
        }
    }
}
