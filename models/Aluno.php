<?php

namespace models;

class Aluno
{
    const tabela = 'aluno';

    public function __construct($dados = [])
    {
        foreach ($dados as $coluna => $valor) {
            if (property_exists($this, $coluna)) {
                $this->{$coluna} = $valor;
            }
        }
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
