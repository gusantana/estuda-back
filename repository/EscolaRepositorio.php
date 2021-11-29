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

    public function getEscolasComTotalDeAlunos()
    {
        $sql = "SELECT es.*, (
            select count(0) from aluno 
            inner join aluno_turma on aluno.id = aluno_turma.id_aluno 
            inner join turma on turma.id = aluno_turma.id_turma 
            where turma.id_escola = es.id 
                and 
	            aluno_turma.data_excluido is null
                and
                aluno.data_excluido is null
                and
                turma.data_excluido IS NULL
            ) as quant_alunos
        FROM ". $this->model::tabela . " es
        WHERE es.data_excluido IS null";

        $statement = $this->conexao->prepare($sql);
        $statement->execute([]);

        $resultado = [];
        while ($tupla = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $resultado[] = $tupla;
        }

        return $resultado ?? [];
    }
}
