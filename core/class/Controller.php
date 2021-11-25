<?php

namespace core;

class Controller
{
    protected $requisicao;

    public function __construct()
    {
        $this->requisicao = new Requisicao();
    }
}