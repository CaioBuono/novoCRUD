<?php

use Apple\Services\Model\Aluno;

require __DIR__ . '/vendor/autoload.php';

define('BUTTON', 'Voltar');
define('TITLE', 'Editar aluno');
define('SUBMIT', 'Atualizar');

// VALIDACAO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?success=false');
  exit;
}

// RECUPERA O ALUNO DO BANCO DE DADOS
$obAluno = Aluno::getAluno($_GET['id']);

// VALIDACAO DO ALUNO
if(!$obAluno instanceof Aluno){
  header('location: index.php?success=false');
  exit;
}

// VALIDACAO DO POST
if(isset($_POST['nome'])){
  $obAluno->nome = $_POST['nome'];
  $obAluno->idade = $_POST['idade'];
  $obAluno->cpf = $_POST['cpf'];
  $obAluno->email = $_POST['email'];
  $obAluno->curso = $_POST['curso'];
  $obAluno->periodo = $_POST['periodo'];
  
  $obAluno->atualizarAluno();
  
  header('Location: index.php?success=true');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';