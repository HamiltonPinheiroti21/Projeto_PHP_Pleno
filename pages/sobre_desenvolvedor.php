<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();

$pdo = new Conexao();

$query = "SELECT * FROM tb_alunos";
$consulta = $pdo->getConn()->prepare($query);
$consulta->execute();

?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Sistema</h2>
    </div>
</div>

<?php include('../layout/menu.php'); // carregando a barra de menu 
?>

<div class="row">
    <div class="col-sm-12 col-md-6 mx-auto">
        <h1>Projeto apresentação</h1>
        <h3>Vaga: Desenvolvedor Pleno PHP</h3>
        <h4><b> Desenvolvido por:</b> Hamilton Botuelho Pinheiro Rosa</h4>
        <div class="badge-base LI-profile-badge" data-locale="pt_BR" data-size="large" data-theme="light" data-type="HORIZONTAL" data-vanity="hamilton-p-0848204b" data-version="v1"><a class="badge-base__link LI-simple-link" href="https://br.linkedin.com/in/hamilton-p-0848204b?trk=profile-badge">Hamilton P.</a></div>
    
    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema