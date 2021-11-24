<?php

namespace core;

class DecodificadorRota
{
    private $umaUrl;
    private $rotaPadrao;
    private $acaoPadrao;
    private $controlador;

    public function __construct($umaUrl, $rotaPadrao, $acaoPadrao)
    {
        $this->umaUrl = $umaUrl;
        $this->rotaPadrao = $rotaPadrao;
        $this->acaoPadrao = $acaoPadrao;
    }

    public function obtemControlador()
    {
        $this->montaNomeDoControlador();
        if ($this->existeControladorNoSistema()) {
            return $this->controlador;
        }
        throw new \Exception("Rota Inexistente");
    }

    private function montaNomeDoControlador()
    {
        $rota = explode('/', $this->umaUrl);
        if (empty($rota[1])) {
            $this->controlador = $this->rotaPadrao . 'Controller';
            return;
        }

        $this->controlador = $rota[1] . 'Controller';
    }

    private function existeControladorNoSistema()
    {
        $controladorExiste = file_exists(DIRETORIO_CONTROLADOR . DIRECTORY_SEPARATOR . $this->controlador . '.php');
        return $controladorExiste;
    }

    public function obtemAcao()
    {
        return $this->montaNomeDaAcao();
    }

    private function montaNomeDaAcao()
    {
        $acao = $this->acaoPadrao;
        $rota = explode('/', $this->umaUrl);

        if (!empty($rota[2])) {
            $acao = $rota[2];
        }
        return $acao;
    }
}
