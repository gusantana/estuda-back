<?php

namespace repository;


include(CORE_DIRETORIO . 'database' . DIRECTORY_SEPARATOR . 'GerenciadorConexao.php');


use core\GerenciadorConexao;

class BaseRepositorio
{
    protected $conexao;

    public function __construct($modelo)
    {
        $this->conexao = (new GerenciadorConexao())->obtemConexao();
        $this->model = $modelo;
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

    public function excluir($entidade)
    {
        if (!empty((int) $entidade->id)) {
            $sql = 'UPDATE ' . $entidade::tabela . ' set data_excluido = CURRENT_TIMESTAMP';
            $where = " WHERE id = :id ";
            $sql .= $where;

            $parametros = [];
            $parametros[':id'] = $entidade->id;

            $statement = $this->conexao->prepare($sql);
            $statement->execute($parametros);

            return $entidade->id;
        }
        throw new \Exception ("Não foi possível excluir o registro");
    }


    public function salvar($entidade)
    {
        if (empty((int) $entidade->id)) {
            return $this->insert($entidade);
        }

        return $this->update($entidade);
    }

    protected function insert($entidade)
    {
        $parametros = [];
        $separador = "";

        $sql = 'INSERT INTO ' . $entidade::tabela . '(';

        $camposDaEntidade = get_object_vars($entidade);
        $colunasDaEntidade = array_keys($camposDaEntidade);

        $sql .= implode(", ", $colunasDaEntidade);
        $sql .= ') VALUES (';


        foreach ($camposDaEntidade as $coluna => $valor) {
            $sql .= "{$separador}:{$coluna}";
            $parametros[":{$coluna}"] = $valor;
            $separador = ", ";
        }

        $sql .= ')';

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $id = $this->conexao->lastInsertId('');

        if (!empty((int) $id)) {
            $entidade->id = $id;
        }

        return $entidade;
    }

    protected function update($entidade)
    {
        $parametros = [];
        $separador = '';

        $sql = 'UPDATE ' . $entidade::tabela . ' set ';

        $camposDaEntidade = get_object_vars($entidade);

        foreach ($camposDaEntidade as $coluna => $valor) {
            $sql .= " $separador {$coluna} = :{$coluna} ";
            $parametros[":{$coluna}"] = $valor;
            $separador = ',';
        }
        $sql .= " $separador data_alterado = CURRENT_TIMESTAMP";

        $sql .= " WHERE id = :id ";

        $parametros[':id'] = $entidade->id;

        $statement = $this->conexao->prepare($sql);
        $statement->execute($parametros);

        $id = $this->conexao->lastInsertId('');

        if (!empty((int) $id)) {
            $entidade->id = $id;
        }
        return $entidade;
    }
}
