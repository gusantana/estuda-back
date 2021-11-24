<?php

namespace core;

require CLASSE_CORE_DIRETORIO . "DecodificadorRota.php";
require CLASSE_CORE_DIRETORIO . 'Requisicao.php';

class Server
{
    private $requisicao;
    private $decodificadorDeRota;

    public function __construct()
    {
        $this->requisicao = new Requisicao();
    }

    public function padraoDeRota($controladorPadrao, $acaoPadrao = "index")
    {
        $this->controladorPadrao = $controladorPadrao;
        $this->acaoPadrao = $acaoPadrao;
    }

    public function trataRequisicao()
    {
        $this->tentaObterControladorEAcao();
    }

    private function tentaObterControladorEAcao()
    {
    }
}
