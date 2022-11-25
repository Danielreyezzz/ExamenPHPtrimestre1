<?php 
namespace examenPHPtrimestre\app;




class Disco extends Soporte{

    public function __construct(
        public String $titulo,
        protected int $numero,
        private float $precio,
        public String $idiomas,
        private String $formatPantalla

    ) {
        parent::__construct($titulo, $numero, $precio);
    }
  
}