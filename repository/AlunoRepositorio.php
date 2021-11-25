<?php

namespace repository;

include_once(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include_once(DIRETORIO_MODEL . 'Aluno.php');

use models\Aluno;

class AlunoRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Aluno();
    }

    public function getPorId($id)
    {
        if (!isset($id)) {
            throw new \Exception("id não informado");
        }

        $sql = 'SELECT * FROM ' . $this->model::tabela;
        $where = 'id = :id';
        $parametros[':id'] = $id;

        $sql .= " WHERE $where";

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $resultado = [];
        while ($tupla = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $resultado[] = $tupla;
        }

        return $resultado[0] ?? [];
    }

    public function salvar($aluno)
    {
        $sql = 'INSERT INTO ' . $this->model::tabela
            . '(nome, email, data_nascimento) VALUES (:nome, :email, :data_nascimento)';

        $parametros = [
            ':nome' => $aluno->nome,
            ':email' => $aluno->email,
            ':data_nascimento' => $aluno->data_nascimento,
        ];

        if (!empty($aluno->id)) {
            $parametros = [];
            $separador = '';

            $sql = 'UPDATE ' . $this->model::tabela . ' set ';
            foreach (get_object_vars($aluno) as $coluna => $valor) {
                $sql .= " $separador {$coluna} = :{$coluna} ";
                $parametros[":{$coluna}"] = $valor;
                $separador = ',';
            }
            $sql .= " $separador data_alterado = CURRENT_TIMESTAMP";

            $sql .= " WHERE id = :id ";

            $parametros[':id'] = $aluno->id;
        }

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $id = $this->conexao->lastInsertId('');

        if (!empty((int) $id)) {
            $aluno->id = $id;
        }

        return $aluno;
    }
}
