<?php

namespace models;

include_once(DIRETORIO_MODEL . 'Model.php');

class AlunoTurma extends Model
{
    const tabela = 'aluno_turma';

    public function __construct($dados = [])
    {
        parent::__construct($dados);
    }

    public $id;
    public $id_aluno;
    public $id_turma;

    private $data_cadastro;
    private $data_alterado;
    private $data_excluido;

    protected $colunasObrigatorias = [
        'id_aluno',
        'id_turma'
    ];
}
