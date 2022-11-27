<?php

namespace examenPHPtrimestre\util;

class ClienteNoEncontradoException extends VideoclubException
{

    public function __construct(
        $message = "</br>El cliente no ha sido encontrado</br>",
        $code = 4,

    ) {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
