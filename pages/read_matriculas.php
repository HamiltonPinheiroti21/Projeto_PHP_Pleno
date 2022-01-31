<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();

$pdo = new Conexao();

$query = "SELECT t0.pk_id as 'pk_id', t1.txt_titulo as 'curso', t1.txt_descricao as 'descricao', t2.txt_nome as 'aluno', t3.txt_nome as 'usuario', t0.dt_registro as 'registro'
FROM tb_matriculas t0 
INNER JOIN tb_cursos t1 
ON t0.fk_id_curso = t1.pk_id
INNER JOIN tb_alunos t2
ON t0.fk_id_aluno = t2.pk_id
INNER JOIN tb_usuarios t3
ON t0.fk_id_usuario = t3.pk_id
ORDER BY t2.txt_nome ASC, t3.txt_nome ASC;";
$consulta = $pdo->getConn()->prepare($query);
$consulta->execute();

?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Matrículas</h2>
    </div>
</div>

<?php include('../layout/menu.php'); // carregando a barra de menu ?>

<div class="row">
    <div class="col-sm-12 col-md-8 mx-auto">


        <table class="table table-striped table-hover col-sm-12 mx-auto bg-light sombra">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Curso</th>
                    <th>Descrição</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>Data Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($db = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                    <tr>
                        <td><?= $db->pk_id ?></td>
                        <td><?= $db->curso ?></td>
                        <td><?= $db->descricao ?></td>
                        <td><?= $db->aluno ?></td>
                        <td><?= $db->usuario ?></td>
                        <td><?= $db->registro ?></td>
                       </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema