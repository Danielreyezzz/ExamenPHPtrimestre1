<?php
//Los hijos no necesitan implementar la interface.
//De hecho si borramos la función de los hijos, cogerá la del padre cuando lo llamemos
//Es decir, $disco->muestraResumen() llamará al muestraResumen del padre si este no tiene el suyo propio
interface iResumible{
    public function muestraResumen();

}