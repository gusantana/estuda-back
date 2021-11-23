<?php

namespace core;

class DecodificadorRota
{
    private $umaUrl;
    private $controlador;

    public function __construct($umaUrl = "/Aluno/")
    {
        $this->umaUrl = $umaUrl;
    }

    public function obtemControlador()
    {
        $this->montaNomeDoControlador();
        if ($this->existeControladorNoSistema) {
            return $this->controlador;
        }
        throw new \Exception("Rota Inexistente");
    }

    private function montaNomeDoControlador()
    {
        $rota = explode('/', $this->umaUrl);
        $this->controlador = $rota[1] . 'Controller';
    }

    private function existeControladorNoSistema()
    {
        $controladorExiste = file_exists(DIRETORIO_CONTROLADOR . DIRECTORY_SEPARATOR . $this->controlador . '.php');
        return $controladorExiste;
    }

    function obtemMetodo()
    {
    }
}
