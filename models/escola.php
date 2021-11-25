<?php

namespace models;

include_once(DIRETORIO_MODEL . 'Model.php');

class Escola extends Model
{
    const tabela = 'escola';

    public function __construct($dados = [])
    {
        parent::__construct($dados);
    } 

    public $id;
    public $nome;
    public $endereco;


    public $data_cadastro;
    public $data_alterado;
    public $data_excluido;
}
