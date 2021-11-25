<?php

namespace models;

include_once(DIRETORIO_MODEL . 'Model.php');

class Turma extends Model
{
    const tabela = 'turma';

    public function __construct($dados = [])
    {
        parent::__construct($dados);
    }

    public $id;
    public $id_escola;
    public $ano;
    public $nivel_ensino;
    public $data_nascimento;
    public $serie;
    public $turno;

    private $data_cadastro;
    private $data_alterado;
    private $data_excluido;

    protected $colunasObrigatorias = [
        'id_escola',
        'nivel_ensino',
        'serie'
    ];
}
