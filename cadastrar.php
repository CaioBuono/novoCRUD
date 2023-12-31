<?php

use Apple\Services\Model\Aluno;

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Voltar');

if(isset($_POST['nome'])){
  $obAluno = new Aluno;
  $obAluno->nome = $_POST['nome'];
  $obAluno->idade = $_POST['idade'];
  $obAluno->cpf = $_POST['cpf'];
  $obAluno->email = $_POST['email'];
  $obAluno->curso = $_POST['curso'];
  $obAluno->periodo = $_POST['periodo'];
  
  $obAluno->cadastrarAluno();
  
  header('Location: index.php?success=true');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';