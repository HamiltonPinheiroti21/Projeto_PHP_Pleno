<?php

require('../layout/head.php');
require('../conexao.php');
require('../functions.php');

// carregando funções para validar a idade do aluno e realizar o cadastro no bando de dados
if (isset($_POST['dados'])) :
    //var_dump($_POST['dados']);
    $dados = $_POST['dados'];
    login($dados[0], $dados[1]);
endif;

?>

<h1 class="bg-faixa titulo">HAMILTON - Desenvolvedor PHP Pleno</h1>

<div class="row">
    <div class="col-sm-12 col-md-4 mx-auto">
      <form action="" method="post">
        <div class="form-group">
          <label for="usuario">Usuário</label>
          <input type="text" class="form-control" id="usuario" name="dados[]" placeholder="Digite seu usario" required>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="email" class="form-control" id="senha" name="dados[]" placeholder="Digite sua Senha" required>
        </div>
        <button type="submit" class="btn btn-primary direita">logar</button>
      </form>
    </div>
  </div>

<?php

require('../layout/footer.php');
