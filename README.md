# Backend do Sistema Escola

### Requisitos: 
PHP 7.0+, MySQL 5.7

Após clonar o projeto:
- Crie um schema com o nome desejado;
- Execute os scripts de criação de tabelas que estão no arquivo ddl.sql
- Configure as credenciais no arquivo dns.ini tomando como base o arquivo dns.ini.example
  - Endereço IP, porta, nome do banco, usuário e senha

### Para executar o sistema:
Entre no diretório raiz do projeto pelo terminal e execute o seguinte comando:

``` php -S 127.0.0.1:8000 -t ./ ```

O sistema estará apto a receber requisições da rede local
