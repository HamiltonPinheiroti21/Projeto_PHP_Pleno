<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();
?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Delete</h2>
    </div>
</div>

<?php

include('../layout/menu.php'); // carregando a barra de menu

// carregando funções para validar a idade do aluno e realizar o cadastro no bando de dados
if (isset($_GET['tipo']) && isset($_GET['id'])) :
    //var_dump($_POST['dados']);
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    deletar($tipo, $id);

endif;

?>


<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema