<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();
?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Cadastro de Usuários</h2>
    </div>
</div>

<?php

include('../layout/menu.php'); // carregando a barra de menu

// carregando funções para validar a idade do aluno e realizar o cadastro no bando de dados
if (isset($_POST['dados'])) :
   // var_dump($_POST['dados']);
    $dados = $_POST['dados'];
    cadastrar_usuario($dados[0], $dados[1]);
endif;

?>

<div class="row">
    <div class="col-sm-12 col-md-6 mx-auto mt-2 mb-5">
        <form method="POST" action="">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="dados[]" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="dados[]" placeholder="" required>
            </div>
            <button type="submit" class="btn btn-primary sombra float-right ml-2">Salvar</button>
        </form>
    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema
