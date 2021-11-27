<?php

namespace core;

require_once CLASSE_CORE_DIRETORIO . "BaseServer.php";
require_once CLASSE_CORE_DIRETORIO . "DecodificadorRota.php";
require_once CLASSE_CORE_DIRETORIO . 'Requisicao.php';
require_once CLASSE_CORE_DIRETORIO . 'DespachadorRequisicao.php';

class Server extends BaseServer
{
    private $requisicao;
    private $decodificadorDeRota;

    public function __construct()
    {
        parent::__construct();
        $this->requisicao = new Requisicao();
        $this->controladorPadrao = "Aluno";
        $this->acaoPadrao = "index";
    }

    public function trataRequisicao()
    {
        $this->tentaObterControladorEAcao();
    }

    private function tentaObterControladorEAcao()
    {
        try {
            $this->decodificadorDeRota = new DecodificadorRota($this->requisicao->getUrl(), $this->controladorPadrao, $this->acaoPadrao);
            $controlador = $this->decodificadorDeRota->obtemControlador();
            $acao = $this->decodificadorDeRota->obtemAcao();
            return $this->despachaRequisicao($controlador, $acao);
        } catch (\Exception $e) {
            print($e->getMessage());
        }
    }

    private function despachaRequisicao($controlador, $acao)
    {
        return new DespachadorRequisicao($controlador, $acao);
    }
}
