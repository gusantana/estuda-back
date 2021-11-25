<?php

namespace repository;

include_once(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include_once(DIRETORIO_MODEL . 'Aluno.php');

use models\Aluno;

class AlunoRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct(new Aluno());
    }

    
}
