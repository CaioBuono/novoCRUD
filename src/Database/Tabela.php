<?php

namespace Apple\Services\Database;

use Exception;
use PDO;
use PDOException;

class Tabela{

  /**
   * HOST DO BANCO DE DADOS
   * 
   * @var string
   */
  const HOST = 'localhost';

  /**
   * NOME DO BANCO DE DADOS
   * 
   * @var string
   */
  const NAME = 'cadastro_alunos';

  /**
   * USUARIO DE ACESSO AO BANCO DE DADOS
   * 
   * @var string
   */
  const USER = 'root';

  /**
   * SENHA PARA ACESSAR O BANCO DE DADOS
   * 
   * @var string
   */
  const PASS = 'toor';

  private $table;

  private $connection;

  /**
   * Metodo responsavel por setar a conexao e definir manipulacao da tabela
   *
   * @param string $table
   */
  public function __construct($table){
    try{
      $this->table = $table;
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
    }catch (PDOException $e){
      throw new Exception('ERROR: ' .$e->getMessage());
    }
  }

  /**
   * Metodo responsavel por executar as querys de SQL
   * @method executarSQL
   * @param string $query
   * @param array $params
   * @return PDOStatement
   */
  public function executarSQL($query, $params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      throw new Exception('ERROR: ' .$e->getMessage());
    }
  }

  /**
   * Metodo responsavel por inserir dados na tabela
   * @method insert
   * @param array $values [type => fields]
   * @return void
   */
  public function insert($values){
    // RECUPERA OS CAMPOS DA TABELA
    $fields = array_keys($values);

    // DEFINE OS PARAMETROS DO STATEMENT
    $binds = array_pad([], count($fields), '?');
    
    // MONTA A QUERY
    $query = 'INSERT INTO '.$this->table.' ('.implode(',', $fields).') VALUES('.implode(',', $binds).')';

    // EXECUTA A QUERY
    $this->executarSQL($query, array_values($values));

    //RETORNA O ID
    return $this->connection->lastInsertId();
  }

  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    // DADOS DA QUERY
    $where = isset($where) ? 'WHERE '.$where : '';
    $order = isset($order) ? 'ORDER BY '.$order : '';
    $limit = isset($limit) ? 'LIMIT '.$limit : '';
    
    // MONTA A QUERY
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    // EXECUTA QUERY
    return $this->executarSQL($query);
  }

}