<?php

namespace models;

class Model 
{
    public function __construct($dados = [])
    {
        foreach ($dados as $coluna => $valor) {
            if (property_exists($this, $coluna)) {
                $this->{$coluna} = $valor;
            }
        }
    }
}
