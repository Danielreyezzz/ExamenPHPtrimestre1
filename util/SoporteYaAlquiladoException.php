<?php

namespace examenPHPtrimestre\util;

class SoporteYaAlquiladoException extends VideoclubException
{

    public function __construct(
        $message = "</br>El soporte ya ha sido alquilado</br>",
        $code = 1,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
