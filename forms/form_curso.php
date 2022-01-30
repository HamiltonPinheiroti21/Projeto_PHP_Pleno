<?php

$pdo = new Conexao();

$query1 = "SELECT * FROM tb_cursos where pk_id = ?";
$consulta = $pdo->getConn()->prepare($query1);
$consulta->bindParam(1, $id, PDO::PARAM_INT);
$consulta->execute();

if (isset($_POST['dados'])) :

    $pdo2 = new Conexao();

    $query = "UPDATE `tb_cursos` SET `txt_titulo` = ?, `txt_descricao` = ?, `dt_inicio` = ?, `dt_fim` = ? WHERE `tb_cursos`.`pk_id` = ?;";
    $cadastro = $pdo2->getConn()->prepare($query);
    $cadastro->bindParam(1, $_POST['dados'][0], PDO::PARAM_STR);
    $cadastro->bindParam(2, $_POST['dados'][1], PDO::PARAM_STR);
    $cadastro->bindParam(3, $_POST['dados'][2], PDO::PARAM_STR);
    $cadastro->bindParam(4, $_POST['dados'][3], PDO::PARAM_STR);
    $cadastro->bindParam(5, $id, PDO::PARAM_STR);

    if ($cadastro->execute()) :
        header('location: ./read_cursos.php');
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Erro!</strong> Por favor verificar dados informados!
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
    endif;
endif;


?>
<div class="row">
    <div class="col-sm-12 col-md-6 mx-auto mt-2 mb-5">
        <form method="POST" action="">
            <?php while ($db = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="titulo">titulo</label>
                        <input type="text" class="form-control" id="titulo" value="<?= $db->txt_titulo ?>" name="dados[]" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="descricao" class="form-control" id="descricao" value="<?= $db->txt_descricao ?>" name="dados[]" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="dtInicio">Data Início</label>
                        <input type="date" class="form-control" id="dtInicio" value="<?= $db->dt_inicio ?>" name="dados[]" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="dtFim">Data Fim</label>
                        <input type="date" class="form-control" id="dtFim" value="<?= $db->dt_fim ?>" name="dados[]" placeholder="" required>
                    </div>

                    <button type="submit" class="btn btn-primary sombra float-right ml-2">Salvar</button>
                <?php } ?>
                </form>
    </div>
</div>