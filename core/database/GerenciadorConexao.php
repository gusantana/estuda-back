<?php

namespace core;

class GerenciadorConexao
{
    private $arquivoIni = 'dns.ini';
    private $configuracoesDoBanco = array();
    private $dsn;
    private $username;
    private $password;
    private static $conexao;

    public function __construct()
    {
        $this->configuracoesDoBanco = parse_ini_file(SISTEMA_DIRETORIO . $this->arquivoIni);

        if (empty($this->configuracoesDoBanco)) {
            http_response_code(500);
            throw new \Exception("Erro arquivo de configuração de banco inexistente");
        }
    }

    public function obtemConexao()
    {
        if (self::$conexao == null){
            $this->montaStringDeConexao();
            self::$conexao = new \PDO($this->dsn, $this->username, $this->password);
        }
        return self::$conexao;
    }

    private function montaStringDeConexao()
    {
        $this->dsn = "mysql:dbname=" 
                        . $this->configuracoesDoBanco['database'] 
                        . ";host=" 
                        . $this->configuracoesDoBanco['host'];
        $this->username = $this->configuracoesDoBanco['user'];
        $this->password = $this->configuracoesDoBanco['password'];
    }
}
