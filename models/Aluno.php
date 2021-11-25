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


    public $data_cadastro;
    public $data_alterado;
    public $data_excluido;
}
