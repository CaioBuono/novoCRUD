<div class="topButton">
  <a href="index.php"><button><?=TITLE?></button></a>
</div>

<div class="contForm">
  <form method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome"/>
    
    <label for="idade">Idade</label>
    <input type="number" name="idade"/>

    <label for="cpf">CPF</label>
    <input type="text" name="cpf"/>

    <label for="email">E-mail</label>
    <input type="email" name="email"/>

    <label for="curso">Cursos</label>
    <select name="curso">
      <option value="ANALISE DE SISTEMAS">Analise de sistemas</option>
      <option value="DESIGN">Design</option>
      <option value="FINANCEIRO">Financeiro</option>
      <option value="ADMINISTRACAO">Administração</option>
    </select>

    <div class="contRadio">
      <input type="radio" name="periodo" id="manha" value="manha"/>
      <label for="manha">Diurno</label>

      <input type="radio" name="periodo" id="manha" value="noite"/>
      <label for="noite">Noturno</label>
    </div>

    <input type="submit" value="Cadastrar">
  </form>
</div>
