<?php

include_once(CLASSE_CORE_DIRETORIO . "Controller.php");
include_once(DIRETORIO_REPOSITORIO . "AlunoTurmaRepositorio.php");
include_once(DIRETORIO_REPOSITORIO . "AlunoRepositorio.php");
include_once(DIRETORIO_MODEL . "AlunoTurma.php");

use \core\Controller;
use repository\AlunoTurmaRepositorio;
use repository\AlunoRepositorio;
use \models\AlunoTurma;

class AlunoTurmaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $repositorio = new AlunoTurmaRepositorio();
        $id = $this->requisicao->get()['id'];

        $resultado = $repositorio->getPorId($id);
        return json_encode($resultado);
    }

    public function getAlunosNaoCadastradosNaTurma()
    {
        $repositorio = new AlunoTurmaRepositorio();
        $resultado = $repositorio->getAlunosNaoCadastradosNaTurma($this->requisicao->get()['id_turma']);
        return json_encode($resultado);
    }


    public function salvar()
    {
        $modelo = new AlunoTurma($this->requisicao->post());
        if ($modelo->validar()) {
            $repositorio = new AlunoTurmaRepositorio();
            $modelo = $repositorio->salvar($modelo);
        }
        return json_encode($modelo);
    }

    public function getAlunosDaTurma()
    {
        $repositorio = new AlunoTurmaRepositorio();
        $id_turma = $this->requisicao->get()['id_turma'];
        $resultado = $repositorio->getAlunosDaTurma($id_turma);
        return json_encode($resultado);
    }

    public function excluir()
    {
        $repositorio = new AlunoTurmaRepositorio();
        $entidade = new AlunoTurma($this->requisicao->post());
        return json_encode($repositorio->excluir($entidade));
    }
}
