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
