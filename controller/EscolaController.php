<?php

include_once(CLASSE_CORE_DIRETORIO . "Controller.php");
include_once(DIRETORIO_REPOSITORIO . "EscolaRepositorio.php");
include_once(DIRETORIO_MODEL . "Escola.php");

use repository\EscolaRepositorio;
use \core\Controller;
use \models\Escola;

class EscolaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $repositorio = new EscolaRepositorio();
        $resultado = $repositorio->getAtivos();
        return json_encode($resultado);
    }

    public function get()
    {
        $repositorio = new EscolaRepositorio();
        $id = $this->requisicao->get()['id'];
        $resultado = $repositorio->getPorId($id);
        return json_encode($resultado);
    }

    public function salvar()
    {
        $modelo = new Escola($this->requisicao->post());
        if ($modelo->validar()) {
            $repositorio = new EscolaRepositorio();
            $modelo = $repositorio->salvar($modelo);
        }
        return json_encode($modelo);
    }

    public function excluir()
    {
        $modelo = new Escola($this->requisicao->post());
        try {
            $repositorio = new EscolaRepositorio();
            return $repositorio->excluir($modelo);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function getComQuantidadeAlunos()
    {
        $repositorio = new EscolaRepositorio();
        $resultado = $repositorio->getEscolasComTotalDeAlunos();
        return json_encode($resultado);
    }
}
