<?php

namespace repository;

include(DIRETORIO_REPOSITORIO . 'BaseRepositorio.php');
include(DIRETORIO_MODEL . 'Escola.php');

use models\Escola;

class EscolaRepositorio extends BaseRepositorio
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Escola();
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
}
