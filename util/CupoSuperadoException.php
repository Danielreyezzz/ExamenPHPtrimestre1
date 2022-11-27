<?php

namespace examenPHPtrimestre\util;

class CupoSuperadoException extends VideoclubException
{

    public function __construct(
        $message = "</br>El cupo de alquileres ha sido superado</br>",
        $code = 3,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
