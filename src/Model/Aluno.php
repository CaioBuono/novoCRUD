<?php

namespace Apple\Services\Model;

use Apple\Services\Database\Tabela;
use PDO;

class Aluno{

  /**
   * ID do aluno no banco de dados
   *
   * @var integer
   */
  public $id;

  /**
   * Nome do aluno
   *
   * @var string
   */
  public $nome;

  /**
   * Idade do aluno
   *
   * @var integer
   */
  public $idade;

  /**
   * CPF do aluno
   *
   * @var string
   */
  public $cpf;

  /**
   * Email do aluno
   *
   * @var string
   */
  public $email;

  /**
   * Curso atuante do aluno
   *
   * @var string
   */
  public $curso;

  /**
   * Periodo de atuacao do aluno
   *
   * @var string
   */
  public $periodo;

  /**
   * Metodo responsavel por cadastrar um aluno
   * @method cadastrarAluno
   * @return boolean
   */
  public function cadastrarAluno(){
    //INSTANCIA A CONEXAO COM A TABELA
    $obTabela = new Tabela('cadastros');

    // SETA CAMPOS DA TABELA
    $this->id = $obTabela->insert(
      $values = [
        'nome'    => $this->nome,
        'idade'   => $this->idade,
        'cpf'     => $this->sanitizarCPF(),
        'email'   => $this->email,
        'curso'   => $this->curso,
        'periodo' => $this->periodo
      ]
      );

    // RETORNA SUCESSO
    return true;
  }

  /**
   * Metodo responsavel por retornar os alunos do banco de dados
   * @method getAlunos
   * @param string $where
   * @param string $order
   * @param string $limit
   * @return array
   */
  public static function getAlunos($where = null, $order = null, $limit = null){
    return (new Tabela('cadastros'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * Metodo responsavel por limpar caracteres indesejados do CPF
   * @method sanitizarCPF
   * @return string
   */
  public function sanitizarCPF(){
    $cpfLimpo = preg_replace('/[^0-9]/', '', $this->cpf);

    return $cpfLimpo;
  }

}