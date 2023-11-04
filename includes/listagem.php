<?php 
  $resultados = '';
  
  foreach($obAlunos as $aluno){
    $resultados .= '<tr>
                      <td>'.$aluno->id.'</td>
                      <td>'.$aluno->nome.'</td>
                      <td>'.$aluno->idade.'</td>
                      <td>'.$aluno->cpf.'</td>
                      <td>'.$aluno->email.'</td>
                      <td>'.$aluno->curso.'</td>
                      <td>'.$aluno->periodo.'</td>
                      <td>
                        <a href="editar.php?id='.$aluno->id.'">
                        <button>Editar</button>
                        </a>
                        <a href="editar.php?id='.$aluno->id.'">
                        <button>Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }
?>

<div class="topButton">
  <a href="cadastrar.php"><button>Novo cadastro</button></a>
</div>

<div class="contTabela">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>IDADE</th>
        <th>CPF</th>
        <th>EMAIL</th>
        <th>CURSO</th>
        <th>PERIODO</th>
        <th>AÇOĒS</th>
      </tr>
    </thead>

    <tbody>
      <?=$resultados?>
    </tbody>
  </table>
</div>