<?php

namespace core;

require CLASSE_CORE_DIRETORIO . "DecodificadorRota.php";
require CLASSE_CORE_DIRETORIO . 'Requisicao.php';

class Server
{
    public function padraoDeRota($controladorPadrao, $acaoPadrao = "index")
    {
        $this->controladorPadrao = $controladorPadrao;
        $this->acaoPadrao = $acaoPadrao;
    }

    public function trataRequisicao()
    {
        $requisicao = new Requisicao();
        $url = $requisicao->getUrl();
        return new DecodificadorRota();
    }
}
