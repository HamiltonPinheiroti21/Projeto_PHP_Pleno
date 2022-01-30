<?php


function login($nome, $email)
{
    session_start();

    $pdo = new Conexao();

    $query = "SELECT * FROM `tb_usuarios` WHERE txt_nome = ? AND txt_email = ? AND fk_id_status = 1;";
    $validar = $pdo->getConn()->prepare($query);
    $validar->bindParam(1, $nome, PDO::PARAM_STR);
    $validar->bindParam(2, $email, PDO::PARAM_STR);

    $validar->execute();
    $cont = $validar->rowCount();
    $base = $validar->fetch(PDO::FETCH_OBJ);
    if ($cont > 0) :

        $_SESSION['sessao'] = array();
        $_SESSION['sessao'] = $base;
        header('location: ./home.php');
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Erro!</strong> Por favor verificar dados informados!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>";
    endif;
}



function validar_sessao()
{
    session_start();

    if (isset($_SESSION['sessao']) && $_SESSION['sessao']->fk_id_status == 1) :
        $_SESSION['sessao'];
    else :
        //unset($_SESSION['sessao']);
        header('location: ./');
        var_dump($_SESSION['sessao']);
    endif;
}

function validar_idade($idade)
{
    $atual = date('Y-m-d', time());
    $dtNascimento = $idade;


    $soma = abs(strtotime($atual) - strtotime($dtNascimento));

    $anos  = floor($soma / (365 * 60 * 60 * 24));
    $meses = floor(($soma - $anos * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $dias   = floor(($soma - $anos * 365 * 60 * 60 * 24 - $meses * 30 * 60 * 60 * 24) / (60 * 60 * 24));

    //echo $anos . " Anos,  " . $meses . " meses e " . $dias . " dias";

    if ($anos <= 15) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Castrado autorizado somente acima de 16 anos!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    else :
        return 1;
    endif;
}

function cadastro_aluno($nome, $email, $dtNascimento)
{
    $pdo = new Conexao();

    $query = "INSERT INTO `tb_alunos` (`pk_id`, `txt_nome`, `txt_email`, `dt_nascimento`, `fk_id_status`)VALUES (NULL, ?, ?, ?, '1');";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $nome, PDO::PARAM_STR);
    $cadastro->bindParam(2, $email, PDO::PARAM_STR);
    $cadastro->bindParam(3, $dtNascimento, PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    endif;
}

function cadastro_Curso($titulo, $descricao, $dtInicio, $dtFim)
{

    $pdo = new Conexao();

    $query = "INSERT INTO `tb_cursos` (`pk_id`, `txt_titulo`, `txt_descricao`, `dt_inicio`, `dt_fim`) VALUES (NULL, ?, ?, ?, ?);";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $titulo, PDO::PARAM_STR);
    $cadastro->bindParam(2, $descricao, PDO::PARAM_STR);
    $cadastro->bindParam(3, $dtInicio, PDO::PARAM_STR);
    $cadastro->bindParam(4, $dtFim, PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    endif;
}

function cadastrar_usuario($nome, $email)
{
    $pdo = new Conexao();

    $query = "INSERT INTO `tb_usuarios` (`pk_id`, `txt_nome`, `txt_email`, `fk_id_status`) VALUES (NULL, ?, ?, '1');";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $nome, PDO::PARAM_STR);
    $cadastro->bindParam(2, $email, PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
            <strong>OK!</strong> Cadastrado com sucesso!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    endif;
}

function validar_Status($status)
{
    $resp = $status == 1 ? 'ativado' : 'desativado';
    echo $resp;
}

function validar_Status_Curso()
{
    $atual = date('Y-m-d', time());
    $data_termino_curso = '2022-2-14';

    if ($atual >= $data_termino_curso) :
        echo "Curso terminado em {$data_termino_curso}";
    else :
        echo "Curso em andamento, termina em: {$atual} ";
    endif;
}

function contagem_De_Alunos($curso)
{
}

function Castrado_Aluno($dados)
{
    $pdo = new Conexao();

    $query = "INSERT INTO `tb_alunos (`pk_id`, `txt_nome`, `txt_email`, `dt_Nascimento`, `fk_id_status`) VALUES (NULL, ?, ?, ?, '1');";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $dados[0], PDO::PARAM_STR);
    $cadastro->bindParam(2, $dados[1], PDO::PARAM_STR);
    $cadastro->bindParam(3, $dados[2], PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "cadastrado com sucesso";
    else :
        echo "Erro no cadastro";
    endif;
}

function Castrado_Curso($dados)
{
    $pdo = new Conexao();

    $query = "INSERT INTO `tb_usuarios` (`pk_id`, `txt_titulo`, `txt_descricao`, `dt_inicio`, `dt_fim`) VALUES (NULL, ?, ?, ?, ?);";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $dados[0], PDO::PARAM_STR);
    $cadastro->bindParam(2, $dados[1], PDO::PARAM_STR);
    $cadastro->bindParam(3, $dados[2], PDO::PARAM_STR);
    $cadastro->bindParam(3, $dados[3], PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "cadastrado com sucesso";
    else :
        echo "Erro no cadastro";
    endif;
}

function Castrado_Usuarios($dados)
{
    $pdo = new Conexao();

    $query = "INSERT INTO `tb_usuarios` (`pk_id`, `txt_nome`, `txt_email`, `fk_id_status`) VALUES (NULL, ?, ?, ?);";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $dados[0], PDO::PARAM_STR);
    $cadastro->bindParam(2, $dados[1], PDO::PARAM_STR);
    $cadastro->bindParam(3, $dados[2], PDO::PARAM_STR);
    if ($cadastro->execute()) :
        echo "cadastrado com sucesso";
    else :
        echo "Erro no cadastro";
    endif;
}


function deletar($tipo, $id)
{
    $tabela = null;

    switch ($tipo) {
        case 'curso':
            $tabela = 'tb_cursos';
            break;
        case 'aluno':
            $tabela = 'tb_alunos';
            break;
        case 'usuario':
            $tabela = "tb_usuarios";
            break;
    }

    $pdo = new Conexao();

    $query = "DELETE FROM $tabela WHERE `pk_id` = ?";
    $validar = $pdo->getConn()->prepare($query);
    $validar->bindParam(1, $id, PDO::PARAM_STR);

    if ($validar->execute()) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
        <strong>OK!</strong> Excluido com sucesso!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Erro!</strong> Não pode Excluir alunos com registros!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>";
    endif;
}


function editar_formulario($tipo, $id = null)
{
    switch ($tipo) {
        case 'curso':
            include('../forms/form_curso.php');
            break;
        case 'aluno':
            include('../forms/form_alunos.php');
            break;
        case 'usuario':
            include('../forms/form_usuarios.php');
            break;
    }
}

function mostrar_status($id)
{
    echo $id == 1 ? "ATIVADO" : "DESATIVADO";
}

function validar_aluno($id)
{

    $pdo = new Conexao();

    $query1 = "SELECT * FROM tb_alunos where pk_id = ?";
    $consulta = $pdo->getConn()->prepare($query1);
    $consulta->bindParam(1, $id, PDO::PARAM_INT);
    $consulta->execute();
    $db = $consulta->fetch(PDO::FETCH_OBJ);
    if ($db->fk_id_status == 1) :
        return 'ok';
    else :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Aluno Desativado!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    endif;
}

function validar_data_curso($id)
{

    $pdo = new Conexao();

    $query1 = "SELECT * FROM tb_cursos where pk_id = ?";
    $consulta = $pdo->getConn()->prepare($query1);
    $consulta->bindParam(1, $id, PDO::PARAM_INT);
    $consulta->execute();
    $db = $consulta->fetch(PDO::FETCH_OBJ);

    $atual = date('Y-m-d', time());


    if ($atual >= $db->dt_inicio && $atual <= $db->dt_fim) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Curso em Andamento!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    elseif ($atual > $db->dt_fim) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Curso Finalizado!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    else :
        return 'ok';
    endif;
}

function contador($id)
{
    $pdo = new Conexao();

    $query1 = "SELECT * FROM tb_matriculas where fk_id_curso = ?;";
    $consulta = $pdo->getConn()->prepare($query1);
    $consulta->bindParam(1, $id, PDO::PARAM_INT);
    $consulta->execute();
    $db = $consulta->fetch(PDO::FETCH_OBJ);
    $cont = $consulta->rowCount();
    $resp = $cont + 1;
    if ($resp >= 10) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>alerta</strong> Turma completa!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    else :
        return 'ok';
    endif;
}



function validar_aluno_matricula_curso($id_aluno, $id_curso)
{
    $pdo = new Conexao();

    $query = "SELECT * FROM `tb_matriculas` WHERE fk_id_aluno = ? AND fk_id_curso = ?;";
    $cadastro = $pdo->getConn()->prepare($query);
    $cadastro->bindParam(1, $id_aluno, PDO::PARAM_STR);
    $cadastro->bindParam(2, $id_curso, PDO::PARAM_STR);
    $cadastro->execute();
    $cont = $cadastro->rowCount();
    if ($cont >= 1) :
        echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Aluno já cadastrado no curso!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    else :
        return 'ok';
    endif;
}

function cadastro_matricula($id_aluno, $id_curso, $id_usuario)
{

    if (contador($id_curso) == 'ok') :
        if (validar_aluno_matricula_curso($id_aluno, $id_curso) == 'ok') :
            $pdo = new Conexao();

            $query = "INSERT INTO `tb_matriculas` (`pk_id`, `fk_id_curso`, `fk_id_aluno`, `fk_id_usuario`) VALUES (NULL, ?, ?, ?);";
            $cadastro = $pdo->getConn()->prepare($query);
            $cadastro->bindParam(1, $id_curso, PDO::PARAM_STR);
            $cadastro->bindParam(2, $id_aluno, PDO::PARAM_STR);
            $cadastro->bindParam(3, $id_usuario, PDO::PARAM_STR);
            if ($cadastro->execute()) :
                echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-success alert-dismissible fade show' role='alert'>
        <strong>OK!</strong> Cadastro com sucesso!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
            else :
                echo "<div class='container mx-auto my-3 col-sm-12 col-md-6 alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Erro!</strong> Cadastro!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
            endif;
        endif;
    endif;
}
