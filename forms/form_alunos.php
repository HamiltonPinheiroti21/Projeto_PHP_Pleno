<?php

$pdo = new Conexao();

$query1 = "SELECT * FROM tb_alunos where pk_id = ?";
$consulta = $pdo->getConn()->prepare($query1);
$consulta->bindParam(1, $id, PDO::PARAM_INT);
$consulta->execute();

if (isset($_POST['dados'])) :

    $pdo2 = new Conexao();

    $query = "UPDATE `tb_alunos` SET `txt_nome` = ?, `txt_email` = ?, `dt_nascimento` = ?, `fk_id_status` = ? WHERE `tb_alunos`.`pk_id` = ?;";
    $cadastro = $pdo2->getConn()->prepare($query);
    $cadastro->bindParam(1, $_POST['dados'][0], PDO::PARAM_STR);
    $cadastro->bindParam(2, $_POST['dados'][1], PDO::PARAM_STR);
    $cadastro->bindParam(3, $_POST['dados'][2], PDO::PARAM_STR);
    $cadastro->bindParam(4, $_POST['dados'][3], PDO::PARAM_STR);
    $cadastro->bindParam(5, $id, PDO::PARAM_STR);

    if ($cadastro->execute()) :
        header('location: ./read_alunos.php');
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
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" value="<?= $db->txt_nome ?>" name="dados[]" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" value="<?= $db->txt_email ?>" name="dados[]" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="dtNascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dtNascimento" value="<?= $db->dt_nascimento ?>" name="dados[]" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ativado / Desativado</label>
                        <select class="form-control" id="" name="dados[]">
                            <option value="1">Ativado</option>
                            <option value="2">Desativado</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary sombra float-right ml-2">Salvar</button>
                <?php } ?>
                </form>
    </div>
</div>