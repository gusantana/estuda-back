<?php

namespace core;

use Exception;

class DespachadorRequisicao
{
    public function __construct ($nomeDoControlador, $acao)
    {
        require(DIRETORIO_CONTROLADOR . DIRECTORY_SEPARATOR . $nomeDoControlador . '.php');
        $reflector = new \ReflectionClass($nomeDoControlador);
        $controlador = $reflector->newInstanceArgs(array());
        if (method_exists($controlador, $acao)) {
            $controlador->{$acao}(new Requisicao());
        }
        else {
            http_response_code(404);
            throw new Exception("404 - Não encontrado");
        }
    }
}
