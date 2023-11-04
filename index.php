<?php

use Apple\Services\Model\Aluno;

require __DIR__ . '/vendor/autoload.php';

$obAlunos = Aluno::getAlunos();

define('TITLE', 'Novo cadastro');

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';