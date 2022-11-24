<?php
include_once "Cliente.php";
include_once "Juego.php";
include_once "Disco.php";
include_once "CintaVideo.php";

class VideoClub
{
    private $producto = [];
    private int $numProductos = 0;
    public $socios = [];
    private int $numSocios = 0;
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
    public function incluirSocio(String $nombre, int $numero, int $maxAlquileresConcurrentes)
    {
        $socio = new Cliente($nombre, $numero, $maxAlquileresConcurrentes);
        array_push($this->socios, $socio);
        ++$this->numSocios;
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
        foreach ($this->socios as $key => $value) {
            if ($value->getNumero() == $numeroCliente) {
                foreach ($this->producto as $llave => $valor) {
                    if ($valor->getNumero() == $numeroSoporte) {
                        $value->alquilar($valor);
                    }
                }
            }
        }

    }
}


$video = new VideoClub("VideoDaniel");
$video->incluirJuego("Undertale", 1, 1.3, "PC", 1, 1);
$video->incluirDvd("Batman", 2, 3, "esp", "fullhd");
$video->incluirCintaVideo("Verano Azul", 3, 4, "5h");
$video->listarProductos();
$video->incluirSocio("Pepe", 1, 4);
$video->incluirSocio("Alba", 2, 2);
$video->alquilarSocioProducto(2, 3);

echo $video->socios[1]->listarAlquileres();
