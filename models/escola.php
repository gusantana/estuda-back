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


    private $data_cadastro;
    private $data_alterado;
    private $data_excluido;

    protected $colunasObrigatorias = [
        'nome',
    ];
}
