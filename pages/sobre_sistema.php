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
        <br>
        <h1> Sistema Cadastro de Alunos</h1>
        <h5>Parametros seguidos para o desenvolvimento:</h5>
        <ul>
            <li>
                Um aluno pode ser matriculado em mais de um curso.
            </li>
            <li>
                Não pode permitir matriculas em cursos em andamento ou encerrados.
            </li>
            <li>
                Não pode permitir matricula de alunos inativos.
            </li>
            <li>
                Não pode permitir cadastro de alunos menores de 16 anos.
            </li>
            <li>
                É limitado a 10 alunos por curso.
            </li>
            <li>
                Somente usuários administradores terão acesso ao sistema. Não é necessário prever acesso de alunos.
            </li>
        </ul>
        <h5>Atributos</h5>
        <pre>
Cursos
Deve ser possível inserir, editar, deletar, visualizar e listar os cursos, sendo que por padrão devem ser listados primeiro os cursos em andamento ou que serão iniciados.

Atributos

Id
Título
Descrição
Data de início
Data de fim
Alunos
Deve ser possível inserir, editar, deletar, visualizar e listar os alunos.

Atributos

Id
Nome
E-mail
Data de nascimento
Status
Matrículas
Deve ser possível inserir, editar, deletar, visualizar e listar as mutrículas.

Atributos

Id
Id Curso
Id Aluno
Id Usuário
Data da matrícula
Usuários
Deve ser possível inserir, editar, deletar, visualizar e listar as usuários.

Atributos

Id
Nome
E-mail
Status

        </pre>
    </div>
</div>

<?php

require('../layout/footer.php'); //Carregadno rodapé da sistema