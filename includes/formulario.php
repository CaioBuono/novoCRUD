<div class="topButton">
  <a href="index.php"><button><?=BUTTON?></button></a>
</div>

<div class="contForm">
  <form method="post">
    <div class="contTitle">
      <h3><?=TITLE?></h3>
    </div>
    <label for="nome">Nome</label>
    <input type="text" name="nome" value="<?=$obAluno->nome?>"/>
    
    <label for="idade">Idade</label>
    <input type="number" name="idade" value="<?=$obAluno->idade?>"/>

    <label for="cpf">CPF</label>
    <input type="text" name="cpf" value="<?=$obAluno->cpf?>"/>

    <label for="email">E-mail</label>
    <input type="email" name="email"/ value="<?=$obAluno->email?>">

    <label for="curso">Cursos</label>
    <select name="curso" value="<?=$obAluno->curso?>">
      <option value="ANALISE DE SISTEMAS">Analise de sistemas</option>
      <option value="DESIGN">Design</option>
      <option value="FINANCEIRO">Financeiro</option>
      <option value="ADMINISTRACAO">Administração</option>
    </select>

    <div class="contRadio">
      <input type="radio" name="periodo" id="manha" value="manha" checked/>
      <label for="manha">Diurno</label>

      <input type="radio" name="periodo" id="manha" value="noite" <?=$obAluno->periodo === 'noite' ? 'checked' : ''?>/>
      <label for="noite">Noturno</label>
    </div>

    <input type="submit" value="<?=SUBMIT?>">
  </form>
</div>
