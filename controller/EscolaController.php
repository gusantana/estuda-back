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
        $id = $this->requisicao->get()['id'];

        $resultado = $repositorio->getPorId($id);
        return json_encode($resultado);
    }

    public function salvar()
    {
        $modelo = new Escola($this->requisicao->post());
        if ($modelo->validar()) {
            $repositorio = new EscolaRepositorio();
            $repositorio->salvar($modelo);
        }
    }
}
  