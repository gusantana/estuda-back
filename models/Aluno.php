<?php
namespace models;

include_once(DIRETORIO_MODEL . 'Model.php');

class Aluno extends Model
{
    const tabela = 'aluno';

    public function __construct($dados = [])
    {
        parent::__construct($dados);
    }

    public $id;
    public $nome;
    public $email;
    public $data_nascimento;
    public $genero;


    private $data_cadastro;
    private $data_alterado;
    private $data_excluido;

    protected $colunasObrigatorias = [
        'nome',
        'email'
    ];
}
