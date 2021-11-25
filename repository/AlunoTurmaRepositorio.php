<?php

namespace repository;

include_once(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include_once(DIRETORIO_MODEL . 'AlunoTurma.php');

use models\AlunoTurma;

class AlunoTurmaRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct(new AlunoTurma());
    }

}
