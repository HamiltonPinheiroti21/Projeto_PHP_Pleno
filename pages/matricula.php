<?php

require_once('../conexao.php'); //gerando conexão com o banco de dados
require_once('../layout/head.php'); //incluindo cabeçacho do sistema
require_once('../functions.php'); //carregando todas as funções da aplicação
validar_sessao();

?>

<div class="row">
    <div class="col-sm-12 mx-auto">
        <h2 class="bg-faixa titulo">Matrícula</h2>
    </div>
</div>

<?php

include('../layout/menu.php'); // carregando a barra de menu

// carregando funções para validar a idade do aluno e realizar o cadastro no bando de dados
if (isset($_POST['dados'])) :
    $dados = $_POST['dados'];
    array_push($dados, $_SESSION['sessao']->pk_id);
    //var_dump($dados);
    if (validar_aluno($dados[0]) === 'ok' && validar_data_curso($dados[1]) === 'ok') :
        cadastro_matricula($dados[0], $dados[1], $dados[2]);
    endif;

endif;

$pdo = new Conexao();

$query1 = "SELECT * FROM tb_alunos";
$alunos = $pdo->getConn()->prepare($query1);
$alunos->execute();

$query2 = "SELECT * FROM tb_cursos";
$cursos = $pdo->getConn()->prepare($query2);
$cursos->execute();

?>

<div class="row">
    <div class="col-sm-12 col-md-6 mx-auto mt-2 mb-5">
        <form method="POST" action="#">
            <div class="form-group">
                <label for="">Alunos</label>
                <select class="form-control" id="" name="dados[]" required>
                    <option value="">Selecionar</option>
                    <?php while ($db = $alunos->fetch(PDO::FETCH_OBJ)) { ?>
                        <option value="<?= $db->pk_id; ?>"><?= $db->txt_nome; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">curso</label>
                <select class="form-control" id="" name="dados[]" required>
                    <option value="" selected disabled>Selecionar</option>
                    <?php while ($db = $cursos->fetch(PDO::FETCH_OBJ)) { ?>
                        <option value="<?= $db->pk_id; ?>"><?= $db->txt_titulo; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary sombra float-right ml-2">Salvar</button>
        </form>
    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema
