<?php

namespace repository;

include(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include(DIRETORIO_MODEL . 'Escola.php');

use models\Escola;

class EscolaRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct(new Escola());
    }

    
}
