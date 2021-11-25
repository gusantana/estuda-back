<?php

include_once(CLASSE_CORE_DIRETORIO . "Controller.php");
include_once(DIRETORIO_REPOSITORIO . "AlunoRepositorio.php");
include_once(DIRETORIO_MODEL.'Aluno.php');

use \core\Controller;
use repository\AlunoRepositorio;

class AlunoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $repositorio = new AlunoRepositorio();
        $id = $this->requisicao->get()['id'];

        $resultado = $repositorio->getPorId($id);
        return json_encode($resultado);
    }

    public function add()
    {
        // new Aluno($this->requisicao->get();
    }
}
