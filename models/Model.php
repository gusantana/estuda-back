<?php

namespace models;

class Model
{
    protected $colunasObrigatorias = [];
    private $camposFaltantes = [];
    protected $chavePrimaria = 'id';

    public function __construct($dados = [])
    {
        foreach ($dados as $coluna => $valor) {
            if (property_exists($this, $coluna)) {
                $this->{$coluna} = $valor;
            }
        }
        $this->{$this->chavePrimaria} = (int) $this->{$this->chavePrimaria};
    }

    public function validar()
    {
        $this->recuperaCamposFaltantes();

        if (empty($this->camposFaltantes)) {
            return true;
        }
        
        http_response_code(412);
        throw new \Exception('campos necessários: ' . implode(', ',$this->camposFaltantes));
    }

    private function recuperaCamposFaltantes()
    {
        $this->camposFaltantes = [];
        foreach ($this->colunasObrigatorias as $coluna) {
            if (empty($this->{$coluna})) {
                $this->camposFaltantes[] = $coluna;
            }
        }
        
    }
}
