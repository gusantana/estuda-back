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


    public function getAlunosNaoCadastradosNaTurma($id_turma)
    {
        $sql = "SELECT a.* from aluno a 
where a.id not in (
	select at2.id_aluno from aluno_turma at2 where at2.id_turma = :id_turma AND at2.data_excluido IS NULL
) AND a.data_excluido is NULL";
        $parametros = [];
        $parametros[':id_turma'] = $id_turma;

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $resultado = [];
        while ($tupla = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $resultado[] = $tupla;
        }

        return $resultado ?? [];
    }


    public function getAlunosDaTurma($id_turma)
    {
        $sql = "SELECT at1.*, a.nome, a.email, a.genero FROM aluno a 
            INNER JOIN aluno_turma at1 on at1.id_aluno = a.id 
            where at1.id_turma = :id_turma 
            and 
            at1.data_excluido is null
            and
            a.data_excluido is null";

        $parametros = [];
        $parametros[':id_turma'] = $id_turma;

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $resultado = [];
        while ($tupla = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $resultado[] = $tupla;
        }

        return $resultado ?? [];
    }
}
