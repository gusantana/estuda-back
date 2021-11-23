<?php

namespace core;

require CLASSE_CORE_DIRETORIO . "DecodificadorRota.php";
require CLASSE_CORE_DIRETORIO . 'Requisicao.php';

class Server
{
    public function trataRequisicao()
    {
        $requisicao = new Requisicao();
        $url = $requisicao->getUrl();
        return new DecodificadorRota();
    }
}
