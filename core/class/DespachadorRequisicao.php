<?php

namespace core;

use Exception;

class DespachadorRequisicao
{
    public function __construct ($nomeDoControlador, $acao)
    {
        require(DIRETORIO_CONTROLADOR . DIRECTORY_SEPARATOR . $nomeDoControlador . '.php');
        $reflector = new \ReflectionClass($nomeDoControlador);
        $controlador = $reflector->newInstanceArgs();
        if (method_exists($controlador, $acao)) {
            ob_start();
            $resposta = $controlador->{$acao}();
            print($resposta);
            ob_flush();
        }
        else {
            http_response_code(404);
            throw new Exception("404 - Não encontrado");
        }
    }
}
