<?php

namespace examenPHPtrimestre\util;

class SoporteNoEncontradoException extends VideoclubException
{

    public function __construct(
        $message = "</br>El soporte no ha sido encontrado</br>",
        $code = 2,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
