<?php

namespace repository;

include(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include(DIRETORIO_MODEL . 'Turma.php');

use models\Turma;

class TurmaRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct(new Turma());
    }
}
