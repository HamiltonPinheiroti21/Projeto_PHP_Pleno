<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();

$pdo = new Conexao();
$query = "SELECT * FROM tb_usuarios";
$consulta = $pdo->getConn()->prepare($query);
$consulta->execute();

?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Usuários</h2>
    </div>
</div>

<?php include('../layout/menu.php'); // carregando a barra de menu ?>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">


        <table class="table table-striped table-hover col-sm-12 mx-auto bg-light sombra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($db = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?= $db->pk_id ?></td>
                        <td><?= $db->txt_nome ?></td>
                        <td><?= $db->txt_email ?></td>
                        <td><?= mostrar_status($db->fk_id_status) ?></td>
                        <td><a href="./edit?tipo=usuario&id=<?= $db->pk_id ?>" class="btn btn-sm btn-primary sombra"><i class="fas fa-edit"></i></a></td>
                        <td><a href="./delete?tipo=usuario&id=<?= $db->pk_id ?>" class="btn btn-sm btn-danger sombra"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema