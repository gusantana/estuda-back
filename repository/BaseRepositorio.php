<?php

namespace repository;


include(CORE_DIRETORIO . 'database' . DIRECTORY_SEPARATOR . 'GerenciadorConexao.php');



use core\GerenciadorConexao;

class BaseRepositorio
{
    protected $conexao;

    public function __construct()
    {
        $this->conexao = (new GerenciadorConexao())->obtemConexao();
    }
}
