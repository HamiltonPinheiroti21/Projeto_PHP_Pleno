<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação

validar_sessao();

?>

<h1 class="bg-faixa titulo">PROJETO PHP</h1>

<?php require('../layout/menu.php') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12" style="text-align: center;">
            <h1>Desenvolvido em PHP Puro</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-2 mx-auto">

            <img class="img-total sombra" src="../img/img2.jpg" alt="">
        </div>
    </div>
</div>

<?php

require('../layout/footer.php');
