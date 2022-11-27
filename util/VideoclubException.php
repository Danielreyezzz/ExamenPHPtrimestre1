<?php
namespace examenPHPtrimestre\util;

use Exception;

class VideoclubException extends Exception
{
 
    public function __construct($message, $code = 0, Exception $previous = null) {
 
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}

//He creado la función padre con el contructor.
//A los hijos les he modificado el contructor para por defecto lanzar el mensaje que yo les digo
//A la hora de implementar las excepciones he decidido utilizar try y catch
//El try y catch me permite capturar las excepciones y tener un mayor control sobre el mensaje que se lanza

