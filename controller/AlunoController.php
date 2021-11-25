<?php

include_once(CLASSE_CORE_DIRETORIO . "Controller.php");
include_once(DIRETORIO_REPOSITORIO . "AlunoRepositorio.php");
include_once(DIRETORIO_MODEL . "Aluno.php");

use \core\Controller;
use repository\AlunoRepositorio;
use models\Aluno;

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

    public function post()
    {
        $modelo = new Aluno($this->requisicao->post());
        if ($modelo->validar()){
            $repositorio = new AlunoRepositorio();
            $repositorio->salvar($modelo);
        }
    }
}
