<?php

require(CLASSE_CORE_DIRETORIO . "Controller.php");
require(DIRETORIO_REPOSITORIO . "EscolaRepositorio.php");
       
use repository\EscolaRepositorio;

class EscolaController extends \core\Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $escolaRepositorio = new EscolaRepositorio();
        $id = $this->requisicao->get()['id'];

        $resultado = $escolaRepositorio->getPorId($id);
        return json_encode($resultado);
    }
}
  