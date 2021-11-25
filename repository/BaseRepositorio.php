<?php

namespace repository;

use database\GerenciadorConexao;

class BaseRepositorio
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = (new GerenciadorConexao())->obtemConexao();
    }
}
